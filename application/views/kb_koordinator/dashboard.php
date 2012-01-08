<div class="content">
    <h1>Dashboard</h1>

    <div>
        Jumlah Knowledge Base: <?php echo $this->db->count_all('tb_knowledge_base'); ?>
    </div>

    <div>
        Jumlah Knowledge Publik: <?php echo $this->db->from('tb_knowledge_base')->where('is_public', 1)->get()->num_rows(); ?>
    </div>

    <div>
        Jumlah Knowledge Privat: <?php echo $this->db->from('tb_knowledge_base')->where('is_public', 0)->get()->num_rows(); ?>
    </div>
</div>