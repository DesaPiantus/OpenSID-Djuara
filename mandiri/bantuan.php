<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<link rel="stylesheet" href="<?= base_url()?>assets/css/jquery-ui-1.12.1.css">
<script src="<?= base_url()?>assets/js/jquery-ui.min.js"></script>
<!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->

<script>
  function show_kartu_peserta(elem){
    var id = elem.attr('target');
    var title = elem.attr('title');
    var url = elem.attr('href');
    $('#'+id+'').remove();

    $('body').append('<div id="'+id+'" title="'+title+'" style="display:none;position:relative;overflow:scroll;"></div>');

    $('#'+id+'').dialog({
      resizable: true,
      draggable: true,
      width: 500,
      height: 'auto',
      open: function(event, ui) {
        $('#'+id+'').load(url);
      }
    });
    $('#'+id+'').dialog('open');
  }
</script>
<style type="text/css">
  .ui-dialog-titlebar {background-color: #e9e9f9;}
</style>
<div class="col-lg-8 col-md-12 col-12">
<div class="panel">
          <div class="header">
            <h4 class="title">Program Bantuan</h4>
          </div>
  <?php if(!empty($daftar_bantuan)): ?>
    <table  class="table table-bordered mt-5">
      <caption> <div class="single_bottom_rightbar wow fadeInDown animated"> 
  <h2>Daftar Bantuan Yang Diterima (Sasaran Perorangan)</h2> </div></caption>
      <thead>
        <tr>
          <th>Nama</th>
          <th>Awal</th>
          <th>Akhir</th>
          <th>ID KARTU</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach ($daftar_bantuan as $bantuan) : ?>
        <tr>
          <td><?= $bantuan['nama']?></td>
          <td><?= tgl_indo($bantuan['sdate'])?></td>
          <td><?= tgl_indo($bantuan['edate'])?></td>
          <td>
            <?php if($bantuan['no_id_kartu']) : ?>
              <button type="button" target="kartu_peserta" title="Kartu Peserta" href="<?= site_url('first/kartu_peserta/'.$bantuan['id'])?>" onclick="show_kartu_peserta($(this));" class="uibutton special"><span class="fa fa-print">&nbsp;</span><?= $bantuan['no_id_kartu']?></button>
            <?php endif; ?>
          </td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  <?php else: ?>
    <span> 
  <div class="single_bottom_rightbar wow fadeInDown animated"> 
  <h2>Anda tidak terdaftar dalam program bantuan apapun</h2> </div></span>
  <?php endif; ?>
</div>
</div>