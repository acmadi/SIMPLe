<div class="content">
    <h1>Dashboard</h1>
	<fieldset>
		<legend>Report</legend>
		<dl>
			<dd>
				<span class="xxlabel red"><?php echo $this->db->count_all('tb_knowledge_base'); ?></span>
				<span class="xxlabel"> Knowledge Base</span>
			</dd>
		</dl>
		<dl>
			<dd>
				<span class="xxlabel red"><?php echo $this->db->from('tb_knowledge_base')->where('is_public', 1)->get()->num_rows(); ?></span>
			<span class="xxlabel">Knowledge Publik</span>
			</dd>
		</dl>
		<dl>
			<dd>
				<span class="xxlabel red"><?php echo $this->db->from('tb_knowledge_base')->where('is_public', 0)->get()->num_rows(); ?></span>
				<span class="xxlabel">Knowledge Privat</span>
			</dd>
		</dl>
	</fieldset>
</div>