var media_id = '';
var folder_id = '/';
var ext = '';
$(".select2").select2();

function gritter(judul,isi,jenis='info'){
	$.bootstrapGrowl(judul+' '+isi,{
		type: jenis,
		delay: 2500,
		allow_dismiss: true
	});
}
$("#mfadd").on("hidden.bs.modal",function(e){
	$("#mfaddform").trigger("reset");
	$("#mfaddloading").show();
	$("#mfaddform").hide('slow');
});
$("#mfmenu").on("hidden.bs.modal",function(e){
	$("#ddelconf").hide('slow');
	$("#dfldrmv").hide('slow');
	if($("#audioreal").length>0){
		$("#audioreal")[0].pause();
	}
});
$("#buploadshow").on("click",function(e){
	e.preventDefault();
	$("#mfadd").modal('show');
	var url = '<?php echo base_url('api_admin/cms/media/'); ?>';
	$.get(url).done(function(dt){
		var h = '';
		$.each(dt.result.folders,function(key,val){
			h += '<option value="'+val.folder+'">'+val.folder+'</option>';
		});
		$("#ifolder").html(h).trigger('change');
		$("#mfaddloading").hide();
		$("#mfaddform").slideDown('slow');

		$("#ifoldertambah").off("click")
		$("#ifoldertambah").on("click",function(e){
			e.preventDefault();
			var f = prompt('Masukan nama folder baru');
			if(f != null){
				h = '<option value="'+f+'">'+f+'</option>';
				$("#ifolder").prepend(h).val(f).trigger('change');
			}
		});
	});
});
$("#mfaddform").on("submit",function(e){
	e.preventDefault();
	gritter('Memuat...','Sedang upload gambar, silakan tunggu!');
	$("#mfadd").modal("hide");

	$.ajax({
		url: '<?php echo base_url('api_admin/cms/media/add'); ?>', // Url to which the request is send
		type: "POST",
		data: new FormData(this),
		contentType: false,
		cache: false,
		processData:false,
		success: function(data){
			if(data.status == "100" || data.status == 100){
				setTimeout(function(){
					gritter('Selesai','Media berhasil diupload');
				},1333);
			}else{
				gritter('Gagal',data.message);
				return false;
			}
			setTimeout(function(){
				row_media_manager();
			},3000);
		},
		error: function(d){
			jQuery.gritter.add({
				title: 'Error',
				text: 'Maaf, sementara ini belum bisa upload media',
				image: '<?php echo base_url('assets/img/ji-char/smile.png'); ?>',
				sticky: false,
				time: ''
			});
		}
	});

});
function row_media_manager(){
	var base_url_img = '<?php echo base_url(); ?>';
	var base_url_def = '<?php echo base_url($this->cms_blog.'/default.jpg'); ?>';
	var url = '<?php echo base_url('api_admin/cms/media/'); ?>';

	url += '?folder='+folder_id;

	var h = '';
	$("#rwm").html('<div class="col-md-12"><h2>Loading....</h2></div>');
	$.get(url).done(function(dt){
		if(dt.status == 100 || dt.status == '100'){
			if(dt.result.files.length > 0){

				var h = '';
				$.each(dt.result.files,function(key,val){
					ext = val.filename;
					ext = ext.slice(val.filename.length-3);
					console.log('ext: '+ext);
					if(ext == 'jpg' || ext == 'png' || ext=='gif'){
						
					}else if(ext == 'mp3' || ext == 'wav'){
						val.thumb = 'media/uploads/default-audio.png';
					}else {
						val.thumb = 'media/uploads/default-file.png';
					}
					h += '<div class="col-xs-6 col-sm-4 col-md-3 document">';
					h += '	<div class="thmb">';
					h += '		<div class="thmb-prev" data-id="'+val.id+'" data-nama="'+val.nama+'" style="background-image:url('+base_url_def+');min-width: 100px;min-height: 100px;">';
					h += '			<img src="'+base_url_img+'/'+val.thumb+'" class="img-responsive" alt="">';
					h += '		</div>';
					h += '		<h5 class="fm-title"><a id="athmbopt" href="#" data-id="'+val.id+'" data-nama="'+val.nama+'">'+val.filename+'</a></h5>';
					h += '		<small class="text-muted">'+val.tgl+'</small>';
					h += '	</div>';
					h += '</div>';
				});

				var base_url_media = '<?php echo base_url(); ?>';

				$("#rwm").html(h);
				$("#rwm").off("click",".thmb-prev");
				$("#rwm").on("click",".thmb-prev",function(e){
					e.preventDefault();
					media_id = $(this).attr("data-id");
					url_img = base_url_media+$(this).attr("data-nama");
					ext = $(this).attr("data-nama");
					ext = ext.slice(ext.length-3);
					$("#copasmedia").val(url_img);
					console.log('ext: '+ext);
					$("#mfmenu_preview").attr('data-filename',url_img);
					var thm = url_img;
					if(ext == 'jpg' || ext == 'png' || ext=='gif'){
						$("#mfmenu_preview").html('<img id="imgreal" src="" class="img-responsive" />');
						$("#imgreal").attr("src",url_img);
					}else if(ext == 'mp3' || ext == 'wav'){
						thm = 'media/uploads/default-audio.png';
						$("#mfmenu_preview").html('<img id="imgreal" src="'+base_url_media+thm+'" class="img-responsive" /><audio id="audioreal" controls><source src="'+url_img+'" type="audio/ogg" />Your browser does not support the audio element.</audio>');
					}else {
						thm = 'media/uploads/default-file.png';
						$("#mfmenu_preview").html('<img id="imgreal" src="'+base_url_media+thm+'" class="img-responsive" />');
					}
					
					$("#mfmenu").modal("show");
				});
				$("#rwm").off("click","#athmbopt");
				$("#rwm").on("click","#athmbopt",function(e){
					e.preventDefault();
					media_id = $(this).attr("data-id");
					url_img = base_url_media+$(this).attr("data-nama");
					$("#copasmedia").val(url_img);
					$("#imgreal").attr("src",url_img);
					$("#mfmenu").modal("show");
				});

				$("#copasmediabutton").off("click");
				$("#copasmediabutton").on("click",function(e){
				  document.getElementById("copasmedia").select();
				  document.execCommand("copy");
					gritter('Berhasil','Teks sudah di copy ke clipboard, tinggal paste');
				});

				//folders
				var h = '';
				$("#folder_list").empty();
				$.each(dt.result.folders,function(key,val){
					h +='<li><a href="#" class="folder_selector" data-folder="'+val.folder+'"><i class="fa fa-folder-o"></i> '+val.folder+'</a></li>';
				});
				$("#folder_list").html(h);

				$("#folder_list").off("click");
				$("#folder_list").on("click",".folder_selector",function(e){
					e.preventDefault();
					folder_id = $(this).attr("data-folder");
					row_media_manager();
				})
			}else{
				var h ='<div class="col-md-12"><h2>Folder Media masih kosong</h2></div>';
				$("#rwm").html(h);
			}
		}

	});
}
setTimeout(function(){
row_media_manager()},333);

$("#bgfldrmv").on("click",function(e){
	$("#ddelconf").hide();
	$.get('<?php echo base_url('api_admin/cms/media/'); ?>').done(function(dt){
		if(dt.status == 100 || dt.status == '100'){
			var h = '';
			$.each(dt.result.folders,function(key,val){
				h += '<option value="'+val.folder+'">'+val.folder+'</option>';
			});
			$("#sfldmv").html(h);
			$("#dfldrmv").slideDown("slow");
			$("#dfldrmvadd").off("click");
			$("#dfldrmvadd").on("click",function(e){
				e.preventDefault();
				var f = prompt("Masukan nama folder baru");
				if(f != null){
					var h = '<option value="'+f+'" selected>'+f+'</option>';
					$("#sfldmv").prepend(h).val(f).trigger('change');
				}
			});

		}
	});

});
$("#dfldrmvs").on("click",function(e){
	e.preventDefault();
	var judul = 'Info';
	var isi = 'Memproses...';
	gritter(judul,isi);

	var id = media_id;
	var folder = $("#sfldmv").val();
	var url = '<?php echo base_url('api_admin/cms/media/move'); ?>';
	var fd = {};
	fd.id = id;
	fd.folder = folder;


	$.post(url,fd).done(function(dt){
		if(dt.status == 100 || dt.status == '100'){
			judul = 'Berhasil';
			isi = 'Media berhasil dipindahkan';
			folder_id = folder;
			row_media_manager();
		}else{
			judul = 'Error';
			isi = dt.message;
		}
		gritter(judul,isi);
	});
	$("#mfmenu").modal("hide");
});

$("#bgdel").on("click",function(e){
	$("#dfldrmv").hide();
	$("#ddelconf").slideDown("slow");
});
$("#ddelconfyes").on("click",function(e){
	e.preventDefault();
	$.get('<?php echo base_url('api_admin/cms/media/del/'); ?>'+media_id).done(function(dt){
		var isi = '';
		var judul = '';
		if(dt.status == 100 || dt.status =='100'){
			judul = 'Berhasil';
			isi = 'Gambar berhasil dihapus';
		}else{
			judul = 'Error';
			isi = dt.message;
		}
		gritter(judul,isi);
		row_media_manager();
	});
	$("#mfmenu").modal("hide");
});
$("#ddelconfno").on("click",function(e){
	e.preventDefault();
	$("#mfmenu").modal("hide");
});
