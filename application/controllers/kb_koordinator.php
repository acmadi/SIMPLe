<?php
class Kb_koordinator extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mknowledge', 'knowledge');
    }

    public function index()
    {
        $this->dashboard();
    }

    public function dashboard()
    {
        $data['title'] = 'Tambah Knowledge Baru';
        $data['content'] = 'kb_koordinator/dashboard';
        // $data['categories'] = $this->knowledge->get_all_category();
        $this->load->view('new-template', $data);
    }

    public function knowledge_base()
    {

        $result = $this->db->from('tb_knowledge_base')
                ->get();

        $data['knowledge_base'] = $result;

        $data['title'] = 'Daftar Knowledge Baru';
        $data['content'] = 'kb_koordinator/knowledge_base';
        // $data['categories'] = $this->knowledge->get_all_category();
        $this->load->view('new-template', $data);

    }

    public function delete($id)
    {
        $this->db->delete('tb_knowledge_base', array('id_knowledge_base' => $id));
        $this->session->set_flashdata('success', 'Data berhasil dihapus');
        $this->log->create("Menghapus Knowledge_base dengan ID $id");
        redirect('/kb_koordinator/knowledge_base');
    }

    public function edit($id)
    {
        if ($this->input->post()) {
			$this->form_validation->set_rules('jawaban', 'Jawaban', 'required');
			$this->form_validation->set_rules('judul', 'Pertanyaan', 'required');
			$this->form_validation->set_rules('is_public', 'Ranah', 'required');
			$this->form_validation->set_rules('id_kat_knowledge_base', 'Kategori', 'required');
			$this->form_validation->set_rules('topik', 'Topik', 'required');
			$this->form_validation->set_rules('narasumber', 'narasumber', 'trim');
			$this->form_validation->set_rules('jabatan_narasumber', 'jabatan_narasumber', 'trim');
			
			if ($this->form_validation->run() == TRUE) {
				$nmBr = '';
				$file_lama = $this->db->query("SELECT bukti_file FROM tb_knowledge_base WHERE id_knowledge_base = ? ",array($id))->row();
				if (isset($_FILES['bukti_file']['name']) && $_FILES['bukti_file']['name'] != ''){
					unlink('upload/knowledge/'.$file_lama->bukti_file);
					$unik = date('YmdHis').'_';
					$nmBr = $unik . $_FILES['bukti_file']['name'];
					move_uploaded_file($_FILES['bukti_file']['tmp_name'], 'upload/knowledge/'. $nmBr);
				}else{
					$nmBr = $file_lama->bukti_file;
				}
				
				$this->db->update('tb_knowledge_base', array(
					'jawaban' => $this->input->post('jawaban'),
					'judul' => $this->input->post('judul'),
					'is_public' => $this->input->post('is_public'),
					'tipe' => $this->input->post('tipe'),
					'nama_narasumber' => $this->input->post('nama_narasumber'),
					'jabatan_narasumber' => $this->input->post('jabatan_narasumber'),
					'id_kat_knowledge_base' => $this->input->post('id_kat_knowledge_base'),
					'bukti_file' => $nmBr,
				), array(
					'id_knowledge_base' => $id
				));
				
				$is_related = $this->db->query("SELECT sent FROM tb_tiket_helpdesk WHERE sent = 1 AND id_knowledge_base = ?",array($id))->num_rows();
				
				if(($is_related > 0) AND ($this->input->post('is_public') == 1) ){
					// kirim email notifikasi
					$this->load->library('djamail');
					
					$kirim = $this->db->query("SELECT *
												FROM tb_tiket_helpdesk
												LEFT JOIN tb_petugas_satker
												ON tb_tiket_helpdesk.id_petugas_satket = tb_petugas_satker.id_petugas_satker
												LEFT JOIN tb_satker
												ON tb_tiket_helpdesk.id_satker = tb_satker.id_satker
												WHERE sent = 1 AND id_knowledge_base = ?",$id);
												
					foreach($kirim->result() as $v):
						$instansi = ($v->nama_satker) ? $v->nama_satker : '';
						$instansi = ($v->instansi) ? $v->instansi : $instansi;

						$mail['kepada']     = $v->nama_petugas;
						$mail['instansi']   = $instansi;
						$mail['pertanyaan'] = $v->pertanyaan;
						$mail['deskripsi']  = $v->description;
						$mail['jawaban']    = $this->input->post('jawaban');

						$isi = $this->load->view('mail-template', $mail, TRUE);
						$attachment = ($nmBr != '') ? 'upload/knowledge/'. $nmBr : '';
						
						//explode email
						$email = explode(';',$v->email);
						
						for($i= 0 ; $i <= count($email) ; $i++){
							$this->djamail->kirim(
							$email[$i],
							'Pemberitahuan Jawaban Pertanyaan Anda #' . $v->no_tiket_helpdesk,
							$isi, 
							$attachment);
						}
					endforeach;
					
					$this->db->query("UPDATE tb_tiket_helpdesk SET sent = 0 WHERE id_knowledge_base = ?",array($id));
				}
				
				$this->session->set_flashdata('success', 'Berhasil mengubah data ke knowledge base');
				$this->log->create("Mengubah Knowledge_base dengan ID {$id}");

				redirect('/kb_koordinator/edit/' . $id);
			}
        }

        $result = $this->db->from('tb_knowledge_base')
                ->where('id_knowledge_base', $id)
                ->get();

        $data['kb'] = $result->row();

        $data['title'] = 'Ubah Knowledge Base';
        $data['content'] = 'kb_koordinator/edit';
        $data['categories'] = $this->knowledge->get_all_category();
        $this->load->view('new-template', $data);
    }

    public function add()
    {
		if($this->input->post()):
			$this->form_validation->set_rules('jawaban', 'Jawaban', 'required');
			$this->form_validation->set_rules('judul', 'Pertanyaan', 'required');
			$this->form_validation->set_rules('is_public', 'Ranah', 'required');
			$this->form_validation->set_rules('id_kat_knowledge_base', 'Kategori', 'required');
			$this->form_validation->set_rules('topik', 'Topik', 'required');
			$this->form_validation->set_rules('narasumber', 'narasumber', 'trim');
			$this->form_validation->set_rules('jabatan_narasumber', 'jabatan_narasumber', 'trim');
			
			if ($this->form_validation->run() == TRUE) {
				$nmBr = '';
				
				if (isset($_FILES['bukti_file']['name']) && $_FILES['bukti_file']['name'] != ''){
					$unik = date('YmdHis').'_';
					$nmBr = $unik . $_FILES['bukti_file']['name'];
					move_uploaded_file($_FILES['bukti_file']['tmp_name'], 'upload/knowledge/'. $nmBr);
				}
				
				$this->db->insert('tb_knowledge_base', array(
					'jawaban' => $this->input->post('jawaban'),
					'desripsi' => $this->input->post('judul'),
					'is_public' => $this->input->post('is_public'),
					'tipe' => $this->input->post('tipe'),
					'judul' => $this->input->post('topik'),
					'nama_narasumber' => $this->input->post('narasumber'),
					'jabatan_narasumber' => $this->input->post('jabatan_narasumber'),
					'id_kat_knowledge_base' => $this->input->post('id_kat_knowledge_base'),
					'bukti_file' => $nmBr,
				));

				$this->session->set_flashdata('success', 'Berhasil menambah data ke knowledge base');
				$this->log->create("Menambah Knowledge_base dengan ID {$this->db->insert_id()}");
				redirect('/kb_koordinator/add');
			}else{
				$data['jawaban'] = $this->input->post('jawaban');
				$data['judul'] = $this->input->post('judul');
				$data['is_public'] = $this->input->post('is_public');
				$data['tipe'] = $this->input->post('tipe');
				$data['topik'] = $this->input->post('topik');
				$data['narasumber'] = $this->input->post('narasumber');
				$data['jabatannarasumber'] = $this->input->post('jabatan_narasumber');
				$data['id_kat_knowledge_base'] = $this->input->post('id_kat_knowledge_base');
			}
		endif;
		
        $data['title'] = 'Tambah Knowledge Baru';
        $data['content'] = 'kb_koordinator/add';
        $data['categories'] = $this->knowledge->get_all_category();
        $this->load->view('new-template', $data);

    }

    public function jawaban_cs()
    {
        $sql = "SELECT * FROM tb_laporan_helpdesk a
                JOIN tb_user b ON b.id_user = a.id_user
                JOIN tb_tiket_helpdesk c ON c.id = a.id_tiket_helpdesk
                JOIN tb_kat_knowledge_base d ON d.id_kat_knowledge_base = c.id_kat_knowledge_base
                ";
        $result = $this->db->query($sql);

        $data['jawaban_cs'] = $result;
        $data['title'] = 'Tambah Knowledge Baru';
        $data['content'] = 'kb_koordinator/jawaban_cs';
        $this->load->view('new-template', $data);
    }
}