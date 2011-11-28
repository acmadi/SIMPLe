function yesOrNo()
{
      if(confirm('Anda Yakin?'))
      {
            return true;
      }
      else
      {
            return false;
      }
}

function hapus()
{
      if(confirm('Apakah Anda yakin menghapus user ini?'))
      {
            return true;
      }
      else
      {
            return false;
      }
}

function adaPertanyaanBaru()
{
      if(confirm('Proses sudah dilaksanakan. Ada pertanyaan baru?'))
      {
		  	window.location='helpdesk_form_pertanyaan_lanjut';
            return true;
      }
      else
      {
            return false;
      }
}

function hapusForum()
{
      if(confirm('Apakah Anda yakin menghapus forum ini?'))
      {
            return true;
      }
      else
      {
            return false;
      }
}

function resetpassword()
{
      if(confirm('Apakah anda yakin akan mereset password user ini menjadi : 123456'))
      {
            return true;
      }
      else
      {
            return false;
      }
}

function noenter() {
  return !(window.event && window.event.keyCode == 13); 
}

function stopRKey(evt) {
  var evt = (evt) ? evt : ((event) ? event : null);
  var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null);
  if ((evt.keyCode == 13) && (node.type=="text"))  {return false;}
}

document.onkeypress = stopRKey; 
