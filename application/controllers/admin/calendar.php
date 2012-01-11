<?php
class Calendar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $prefs['template'] = '

           {table_open}<table class="calendar" border="0" cellpadding="0" cellspacing="0">{/table_open}

           {heading_row_start}<tr>{/heading_row_start}

           {heading_previous_cell}<th><a href="{previous_url}">&lt;&lt;</a></th>{/heading_previous_cell}
           {heading_title_cell}<th colspan="{colspan}">{heading}</th>{/heading_title_cell}
           {heading_next_cell}<th><a href="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}

           {heading_row_end}</tr>{/heading_row_end}

           {week_row_start}<tr>{/week_row_start}
           {week_day_cell}<td>{week_day}</td>{/week_day_cell}
           {week_row_end}</tr>{/week_row_end}

           {cal_row_start}<tr>{/cal_row_start}
           {cal_cell_start}<td>{/cal_cell_start}

           {cal_cell_content}<a href="{content}">{day}</a>{/cal_cell_content}
           {cal_cell_content_today}<div class="highlight"><a href="{content}">{day}</a></div>{/cal_cell_content_today}

           {cal_cell_no_content}{day}{/cal_cell_no_content}
           {cal_cell_no_content_today}<div class="highlight">{day}</div>{/cal_cell_no_content_today}

           {cal_cell_blank}&nbsp;{/cal_cell_blank}

           {cal_cell_end}</td>{/cal_cell_end}
           {cal_row_end}</tr>{/cal_row_end}

           {table_close}</table>{/table_close}
        ';

        $this->calendar->initialize($prefs);

        $result = $this->db->from('tb_calendar')
                ->where('year', date('Y'))
                ->get();

        $data['holiday'] = $result;

        $data['title'] = 'Calendar';
        $data['content'] = 'admin/calendar/calendar';

        $bc[0]->link = 'admin/dashboard';
        $bc[0]->label = 'Home';
        $bc[1]->link = 'admin/calendar';
        $bc[1]->label = 'Kalender';
        $data['breadcrumb'] = $bc;

        $this->load->view('admin/template', $data);
    }

    public function add()
    {
        if ($this->input->post('submit')) {

            $this->form_validation->set_rules('calendar', 'Tanggal', 'required');
            $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

            if ($this->form_validation->run()) {

                // Seharusnya ini gak perlu. Tapi males ngubah view di calendar/calendar.
                // Jadi yaa sementara gini aja dulu lahh...
                $exploded = explode('-', $this->input->post('calendar'));
                $cal['year'] = $exploded[0];
                $cal['month'] = $exploded[1];
                $cal['day'] = $exploded[2];


                $cal['holiday'] = $this->input->post('calendar');
                $cal['keterangan'] = $this->input->post('keterangan');

                $result = $this->db->insert('tb_calendar', $cal);
                if ($result) {
                    $this->session->set_flashdata('success', 'Kalendar baru berhasil ditambahkan');
                    $this->log->create("Kalendar baru ID {$this->db->insert_id()} berhasil ditambahkan");

                } else {
                    $this->session->set_flashdata('error', 'Kalendar baru gagal ditambahkan');
                    $this->log->create("Kalendar baru gagal ditambahkan");
                }
                redirect('/admin/calendar/add');
            }

        }

        $data['title'] = 'Calendar';
        $data['content'] = 'admin/calendar/add';

        $bc[0]->link = 'admin/dashboard';
        $bc[0]->label = 'Home';
        $bc[1]->link = 'admin/calendar';
        $bc[1]->label = 'Kalendar';
        $bc[2]->link = $this->uri->uri_string();
        $bc[2]->label = 'Tambah Baru';
        $data['breadcrumb'] = $bc;

        $this->load->view('admin/template', $data);
    }

    public function edit($id)
    {
        if ($this->input->post('submit')) {

            $this->form_validation->set_rules('calendar', 'Tanggal', 'required');
            $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

            if ($this->form_validation->run()) {

                // Seharusnya ini gak perlu. Tapi males ngubah view di calendar/calendar.
                // Jadi yaa sementara gini aja dulu lahh...
                $exploded = explode('-', $this->input->post('calendar'));
                $cal['year'] = $exploded[0];
                $cal['month'] = $exploded[1];
                $cal['day'] = $exploded[2];

                $cal['holiday'] = $this->input->post('calendar');
                $cal['keterangan'] = $this->input->post('keterangan');

                $result = $this->db->update('tb_calendar', $cal, array('id' => $id));

                if ($result) {
                    $this->session->set_flashdata('success', "Kalendar ID $id berhasil diubah");
                    $this->log->create("Kalendar ID $id berhasil diubah");
                } else {
                    $this->session->set_flashdata('error', "Kalendar ID $id gagal ditambahkan");
                    $this->log->create("Kalendar ID $id gagal ditambahkan");
                }
                redirect('/admin/calendar/edit/' . $id);
            }
        }

        $data['title'] = 'Calendar';
        $data['content'] = 'admin/calendar/edit';

        $data['row'] = $this->db->from('tb_calendar')
                ->where('id', $id)
                ->get()->row();
        
        $bc[0]->link = 'admin/dashboard';
        $bc[0]->label = 'Home';
        $bc[1]->link = 'admin/calendar';
        $bc[1]->label = 'Kalendar';
        $bc[2]->link = $this->uri->uri_string();
        $bc[2]->label = 'Ubah Data';
        $data['breadcrumb'] = $bc;

        $this->load->view('admin/template', $data);
    }

    public function delete($year, $month, $day)
    {
        $this->db->delete('tb_calendar', array(
            'year' => $year,
            'month' => $month,
            'day' => $day
        ));
        $this->session->set_flashdata('success', 'Tanggal berhasil dihapus');
        $this->log->create("Menghapus tanggal $year-$month-$day");
        redirect(site_url('admin/calendar/'));
    }
}