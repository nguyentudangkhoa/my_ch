var flag=false;
var $window = $(window),
$document = $(document);
var color=0;
Cart = new function(){
	var root=this;
	root.refreshCart = function($_flag=false){
		$.post("thanh-toan.html",function(data){
			$("#box-shopcart").html(data);
			NProgress.done();
			//root.updateCartNumber();
			root.BuyCart();
			flag=false;
			if($_flag==true){
				root.LoadShip();
			}
		})
	}
	root.refreshCheckOut = function(){
		$.post("checkout.html",function(data){
			$("#sanpham").html(data);
			NProgress.done();
			root.LoadShip();
		})
	}
	root.updateCart = function(){
		NProgress.start();
		$("#main_content").animate({opacity:".9"});
		initAjax({
			url:"ajax/update-cart.html",
			data:$("#box-shopcart form").serialize(),
			success:function(data){
				root.refreshCart();
			}
		})
	}
	root.Update=function(pros,value,elm,price=0){
		NProgress.start();
		if(pros=='size' || pros=='mausp'){
			$(elm).parents('.properties').find('input.prop').attr('value',value);
			$(elm).parents('.dropdown').find('p').text(value);
			if(pros=='size'){
				$(elm).parents('.properties').find('input.prop_gia').attr('value',price);
			}
		}
		initAjax({
			url:"ajax/update-cart.html",
			data:$("#box-shopcart form").serialize(),
			success:function(data){
				root.refreshCart();
				//root.BuyCart();
			}
		});
	}
	root.deleteCart = function($shop_id,$id){
		NProgress.start();
		$("#main_content").animate({opacity:".9"});
		initAjax({
			url:"ajax/delete-cart.html",
			data:{id:$id,shop_id:$shop_id},
			success:function(data){
				root.refreshCart();
			}
		});
	}
	root.clearCart = function(){
		if(confirm("Bạn muốn xóa toàn bộ giỏ hàng?")){
			NProgress.start();
			$("#main_content").animate({opacity:".9"});
			initAjax({
				url:"ajax/clear-cart.html",
				success:function(data){
					root.refreshCart();
				}
			})
		}
	}
	root.Khieunai=function($id){
		$.confirm({
			boxWidth: '300px',
			useBootstrap: false,
			columnClass: 'small',
			title: 'Thông báo',
			content:'Bạn muốn gửi khiếu nại cho đơn hàng này!',
			type: 'blue',
			buttons: {
				OK: function(){
					$.ajax({
						url: 'ajax/khieunai.html',
						type: 'POST',
						dataType:'json',
						data: {id_order:$id},
						async:false,
						success:function(data){
							if(data.error==1){
								window.location.href='khieu-nai.html&order='+$id;
							}
						}
					})
				}
			},
		});
	}
	root.Checkouts=function(){
		if(!$('#box-shopcart input:not(.no_count)[type="checkbox"]:checked').length){
			$.confirm({
				boxWidth: '300px',
				useBootstrap: false,
				columnClass: 'small',
				title: 'Thông báo',
				content:'Bạn chưa chọn mua sản phẩm nào !',
				type: 'blue',
				autoClose: 'OK|3000',
				buttons: {OK: function(){}},
			});
			return false;
		}else{
			window.location.href='checkout.html';
		}
	}
	root.checkShopProduct=function(check,emel){
		if($(check).is(':checked')){
			$(check).parents(emel).find('input[type="checkbox"]').prop('checked', true);
		}else{
			$(check).parents(emel).find('input[type="checkbox"]').prop('checked', false);
		}
		root.SetBuy();
	}
	root.BuyCart=function(){
		var price=0;
		$('p.cart_price i').text($('#box-shopcart input:not(.no_count)[type="checkbox"]:checked').length);
		$('#box-shopcart input:not(.no_count)[type="checkbox"]:checked').each(function(index, el) {
			price+=parseInt($(this).attr('data-price'));
		});
		$('span.all_price_cart').text(formatNumber(price, '.', '.')+' ₫');
		if($('#box-shopcart input[type="checkbox"]:not(.no_count):checked').length == $('#box-shopcart input[type="checkbox"]:not(.no_count)').length){
			$('#check_all_shop,#check_all_shop1').prop('checked', true);
		}else{
			$('#check_all_shop,#check_all_shop1').prop('checked', false);
		}
		$('.wrap_cart_shop').each(function(index, el) {
			var slcheck=parseInt($(this).find('.body_cart_shop').find('input[type="checkbox"]').length);
			var daChekc=parseInt($(this).find('.body_cart_shop').find('input[type="checkbox"]:checked').length);
			if(slcheck==daChekc){
				$(this).find('input[name="check_buy"]').prop('checked', true);
			}else{
				$(this).find('input[name="check_buy"]').prop('checked', false);
			}
		});
	}
	root.SetBuy=function(){
		NProgress.start();
		initAjax({
			url:"ajax/set-buy.html",
			data:$("#box-shopcart form").serialize(),
			success:function(data){
				root.refreshCart();
			}
		})
	}
	root.CallDc=function(){
		$('.body-diachi-user').addClass('hide');
		$('.list-diachi-user-checkout').removeClass('hide');
		return false;
	}
	root.SetDc=function(){
		$('.overlayloading').show();
		$('.d-gt a').removeClass('active');
		$('body').addClass('is_loader');
		$('.body-diachi-user').removeClass('hide');
		$('.list-diachi-user-checkout').addClass('hide');
		var id_dc=$('input[name="dcc"]:checked').val();
		$.ajax({
			url: 'ajax/set-diachi.html',
			type: 'POST',
			data: {id_dc: id_dc},
			success:function(){
				root.refreshCheckOut();
			}
		})
	}
	root.ResetDc=function(){
		$('.body-diachi-user').removeClass('hide');
		$('.list-diachi-user-checkout').addClass('hide');
		return false;
	}
	root.LoadAllPrice=function(){
	}
	root.DaNhanHang=function($id_order){
		$.confirm({
			boxWidth: '300px',
			useBootstrap: false,
			columnClass: 'small',
			title: 'Đã nhận hàng',
			content:'Xác nhận bạn đã nhận đơn hàng này !',
			type: 'blue',
			buttons: {OK: function(){
				$.ajax({
					url: 'ajax/danhanhang.html',
					type: 'POST',
					data: {id_order: $id_order},
					success:function(data){
						$.alert('Xác nhận thành công!');
					}
				})
			}},
		});
	}
	root.MuaLai=function($id_order){
		$.confirm({
			boxWidth: '300px',
			useBootstrap: false,
			columnClass: 'small',
			title: 'Mua lại đơn hàng',
			content:'Bạn muốn mua lại đơn hàng này ?',
			type: 'blue',
			buttons: {OK: function(){
				$.ajax({
					url: 'ajax/mualaidonhang.html',
					type: 'POST',
					data: {id_order: $id_order},
					success:function(data){
						window.location.href='checkout.html';
					}
				})
			}},
		});
	}
	root.Huydon=function($id_order){
		$.confirm({
			boxWidth: '300px',
			useBootstrap: false,
			columnClass: 'small',
			title: 'Hủy đơn hàng',
			content:'Bạn muốn hủy đơn hàng này ?',
			type: 'red',
			buttons: {OK: function(){
				$.ajax({
					url: 'ajax/huydon.html',
					type: 'POST',
					dataType:'json',
					data: {id_order: $id_order},
					success:function(data){
						if(data.reload==0){
							$.alert({
								title: 'Hủy đơn thất bại',
								content: data.mess,
							});
						}
						if(data.reload==1) window.location.reload();
					}
				})
			}},
		});
	}
	root.DongKhieuNai=function($id_order){
		$.confirm({
			boxWidth: '300px',
			useBootstrap: false,
			columnClass: 'small',
			title: 'Thông báo',
			content:'Bạn muốn đóng khiếu nại đơn hàng này ?',
			type: 'red',
			buttons: {OK: function(){
				$.ajax({
					url: 'ajax/dongkhieunai.html',
					type: 'POST',
					data: {id_order: $id_order},
					success:function(data){
						window.location.href='don-hang.html&tinhtrang=4';
					}
				})
			}},
		});
	}
	root.LoadShip=function(){
		var tongship=0;
		var tong_all=parseInt($('p.total_order').data('all'));
		$('.trongluong').each(function(index, el) {
			var id_province=$('input[name="data[id_tinh]"]').val();
			var id_district=$('input[name="data[id_huyen]"]').val();
			var id_wards=$('input[name="data[id_xa]"]').val();
			var trongluong=$(this).val();
			var type_shop=$(this).data('type');
			var ngayggiao=$(this).data('ngayggiao');
			var type=1;
			var id_shop=$(this).data('shop');
			$.ajax({
				url: 'ajax/loadphiship.php',
				type: 'POST',
				async:false,
				data: {type:type,id_shop:id_shop,trongluong:trongluong,id_province:id_province,id_district:id_district,id_wards:id_wards,ngayggiao:ngayggiao,type_shop:type_shop},
				dataType:'json',
				success: function(data){
					tongship=tongship+data.ship;
					$('.text_price_ship_shop_'+id_shop).text(data.priceship);
					$('input.ship_shop_'+id_shop).attr('value',data.ship);
					$('.price_all_shop_'+id_shop).text(data.showtotal);
					$('.text_time_bv_shop_'+id_shop).text(data.textship);
					$('input.code_ship_shop_'+id_shop).attr('value',data.codeship);
					$('input.name_ship_shop_'+id_shop).attr('value',data.nameship);
					$('input.date_ship_shop_'+id_shop).attr('value',data.dateship);
					if((index+1)==$('.trongluong').length){
						$('p.total_fee').text(formatNumber(tongship, '.', '.')+' ₫');
						$('p.total_bill').text(formatNumber(parseInt(tong_all+tongship), '.', '.')+' ₫');
						if($('.overlayloading').length){
							$('.overlayloading').hide();
							$('body').removeClass('is_loader');
							$('.d-gt a').addClass('active');
						}
					}
				}
			});
		});
	}
};
User = new function(){
	var root=this;
	root.login=function(){
		if(!$('#login-email').val()){
			alert('Bạn cần nhập Email hoặc tên đăng nhập!');
			$('#login-email').focus();
			return false;
		}
		if(!$('#login-pass').val()){
			alert('Bạn cần nhập mật khẩu để đăng nhập!');
			$('#login-pass').focus();
			return false;
		}
		$('.overlayloading').removeClass('d-none');
		$('body').addClass('is_loader');
		$.ajax({
			url: 'ajax/ajax_user.php',
			type: 'POST',
			dataType: 'json',
			data: $('#form-login').serialize(),
			success:function(data){
				setTimeout(function(){
					$('.overlayloading').addClass('d-none');
					$('body').removeClass('is_loader');
					if(data.code==0){
						$.confirm({
							boxWidth: '300px',
							useBootstrap: false,
							columnClass: 'small',
							title: 'Thất Bại',
							content:data.mess,
							type: 'red',
							autoClose: 'OK|2000',
							buttons: {OK: function(){}},
						});
					}else{
						window.location.href=data.href;
					}
				},1000);
			}
		})
	}
	root.NewPass=function(){
		if(!$('#login-email').val()){
			alert('Bạn cần nhập email để tiến hành lấy lại mật khẩu!');
			$('#login-email').focus();
			return false;
		}
		if(isEmail_fix($('#login-email').val(), 'Email bạn nhập không hợp lệ !')){$('#login-email').focus();return false;}
		$('.overlayloading').removeClass('d-none');
		$('body').addClass('is_loader');
		$.ajax({
			url: 'ajax/ajax_user.php',
			type: 'POST',
			dataType: 'json',
			data:{email:$('#login-email').val(),act:'laymatkhau'},
			success:function(data){
				setTimeout(function(){
					$('.overlayloading').addClass('d-none');
					$('body').removeClass('is_loader');
					if(data.code==0){
						$.confirm({
							boxWidth: '300px',
							useBootstrap: false,
							columnClass: 'small',
							title: 'Thất Bại',
							content:data.mess,
							type: 'red',
							autoClose: 'OK|2000',
							buttons: {OK: function(){}},
						});
					}else{
						$.confirm({
							boxWidth: '300px',
							useBootstrap: false,
							columnClass: 'small',
							title: 'Thành Công',
							content:data.mess,
							type: 'blue',
							autoClose: 'OK|1000',
							buttons: {OK: function(){
								window.location.href=data.href;
							}},
						});
					}
				},1000);
			}
		})
	}
	root.check_user=function(){
		if(!$('#register-phone').val()){
			alert('Bạn cần nhập số điện thoại để tiến hành đăng ký!');
			$('#register-phone').focus();
			return false;
		}
		if(!isPhone_fix($('#register-phone').val())){
			alert('Số điện thoại không hợp lệ!');
			$('#register-phone').focus();
			return false;
		}
		if(!$('#register-username').val()){
			alert('Bạn cần nhập tên đăng nhập để tiến hành đăng ký!');
			$('#register-username').focus();
			return false;
		}
		$('.overlayloading').removeClass('d-none');
		$('body').addClass('is_loader');
		$.ajax({
			url: 'ajax/ajax_user.php',
			type: 'POST',
			dataType: 'json',
			data:{phone:$('#register-phone').val(),username:$('#register-username').val(),act:'check_user'},
			success:function(data){
				setTimeout(function(){
					$('.overlayloading').addClass('d-none');
					$('body').removeClass('is_loader');
					if(data.code==0){
						$.confirm({
							boxWidth: '300px',
							useBootstrap: false,
							columnClass: 'small',
							title: 'Thất Bại',
							content:data.mess,
							type: 'red',
							autoClose: 'OK|2000',
							buttons: {OK: function(){}},
						});
					}else{
						$('.box-step1').addClass('d-none');
						$('.box-step2').addClass('d-block');
						$('.not_login2').removeClass('d-none');
						$('.not_login').addClass('step');
					}
				},1000);
			}
		})
	}
	root.UpdatePass=function(){
		if(!$('#register-pass').val()){
			alert('Bạn cần nhập mật khẩu để hoàn hành đăng ký!');
			$('#register-pass').focus();
			return false;
		}
		if(!$('#register-repass').val()){
			alert('Nhập lại mật khẩu để hoàn hành đăng ký!');
			$('#register-repass').focus();
			return false;
		}
		$('.overlayloading').removeClass('d-none');
		$('body').addClass('is_loader');
		$.ajax({
			url: 'ajax/ajax_user.php',
			type: 'POST',
			dataType: 'json',
			data:$('#form-login').serialize(),
			success:function(data){
				setTimeout(function(){
					$('.overlayloading').addClass('d-none');
					$('body').removeClass('is_loader');
					if(data.code==0){
						$.confirm({
							boxWidth: '300px',
							useBootstrap: false,
							columnClass: 'small',
							title: 'Xác nhận thất bại',
							content:data.mess,
							type: 'red',
							autoClose: 'OK|2000',
							buttons: {OK: function(){
								if(data.reload==1){
									window.location.reload();
								}
							}},
						});
					}else{
						$.confirm({
							boxWidth: '300px',
							useBootstrap: false,
							columnClass: 'small',
							title: 'Xác nhận thành công',
							content:data.mess,
							type: 'blue',
							autoClose: 'OK|2000',
							buttons: {OK: function(){
								window.location.href='tai-khoan.html';
							}},
						});
					}
				},1000);
			}
		});
	}
	root.register=function(){
		if(!$('#register-pass').val()){
			alert('Bạn cần nhập mật khẩu để tiến hành đăng ký!');
			$('#register-pass').focus();
			return false;
		}
		if(!$('#register-repass').val()){
			alert('Nhập lại mật khẩu để tiến hành đăng ký!');
			$('#register-repass').focus();
			return false;
		}
		$('.overlayloading').removeClass('d-none');
		$('body').addClass('is_loader');
		$.ajax({
			url: 'ajax/ajax_user.php',
			type: 'POST',
			dataType: 'json',
			data:$('#form-dangky').serialize(),
			success:function(data){
				setTimeout(function(){
					$('.overlayloading').addClass('d-none');
					$('body').removeClass('is_loader');
					if(data.code==0){
						$.confirm({
							boxWidth: '300px',
							useBootstrap: false,
							columnClass: 'small',
							title: 'Đăng ký thất bại',
							content:data.mess,
							type: 'red',
							autoClose: 'OK|2000',
							buttons: {OK: function(){
								if(data.reload==1){
									window.location.reload();
								}
							}},
						});
					}else{
						$.confirm({
							boxWidth: '300px',
							useBootstrap: false,
							columnClass: 'small',
							title: 'Đăng ký thành công',
							content:data.mess,
							type: 'blue',
							autoClose: 'OK|2000',
							buttons: {OK: function(){
								window.location.href='tai-khoan.html';
							}},
						});
					}
				},1000);
			}
		});
	}
	root.LikeProduct=function($idproduct,elm){
		$act=($(elm).hasClass('active'))?'remove':'add';
		$.ajax({
			url: 'ajax/ajax_user.php',
			type: 'POST',
			data: {idproduct: $idproduct,act:'likeproduct',cmd:$act},
			async:false,
			success:function(data){
				$('.like-product-'+$idproduct).toggleClass('active');
			}
		})
	}
};
$(".ripple-effect").on("pointerdown", function(e) {
	let rect = this.getBoundingClientRect();
	let radius = findFurthestPoint(e.clientX, this.offsetWidth, rect.left, e.clientY, this.offsetHeight, rect.top);
	let circle = document.createElement("div");
	circle.classList.add("ripple");
	circle.style.left = e.clientX - rect.left - radius + "px";
	circle.style.top = e.clientY - rect.top - radius + "px";
	circle.style.width = circle.style.height = radius * 2 + "px";
	$(this).append(circle);
});
$(".ripple-effect").on("pointerup mouseleave dragleave touchmove touchend touchcancel", function() {
	let ripple = $(this).find(".ripple");
	if (ripple.lenght != 0) {
		ripple.css("opacity", "0");
		setTimeout(() => {
			ripple.remove()
		}, 300);
	}
});
function findFurthestPoint(clickPointX, elementWidth, offsetX, clickPointY, elementHeight, offsetY) {
	let x = clickPointX - offsetX > elementWidth / 2 ? 0 : elementWidth;
	let y = clickPointY - offsetY > elementHeight / 2 ? 0 : elementHeight;
	let d = Math.hypot(x - (clickPointX - offsetX), y - (clickPointY - offsetY));
	return d;
}
function isEmail_fix(t,o){return emailRegExp=/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.([a-z]){2,4})$/,!emailRegExp.test(t)&&(void 0!==o&&alert(o),!0)}
function formatNumber(nStr, decSeperate, groupSeperate) {
	nStr += '';
	x = nStr.split(decSeperate);
	x1 = x[0];
	x2 = x.length > 1 ? '.' + x[1] : '';
	var rgx = /(\d+)(\d{3})/;
	while (rgx.test(x1)) {
		x1 = x1.replace(rgx, '$1' + groupSeperate + '$2');
	}
	return x1 + x2;
}
function initAjax(options){
	var defaults = {
		url:      '',
		type:    'post',
		async:false,
		data:null,
		dataType:  'html',
		error:  function(e){console.log(e)},
		success:function(){return false;},
		beforeSend:function(){},
	};
	var options = $.extend({}, defaults, options);
	$.ajax({
		url:options.url,
		data:options.data,
		success:options.success,
		error:options.error,
		type:options.type,
		dataType:options.dataType,
	})
}
function deleteDiachi(id){
	if (confirm('Bạn muốn xóa địa chỉ này ?')) {
		$.ajax({
			url: 'ajax/ajax_edit_diachi.php',
			type: 'POST',
			data: {act: 'delete-address',id:id},
			success:function(){
				window.location.reload();
			}
		});
	}
}
function loadDiachi() {
	$("#exampleModalCenter").modal("show");
}
function loadDiachiEdit(id){
	$.ajax({
		url: 'ajax/ajax_edit_diachi.php',
		type: 'POST',
		data: {act: 'edit-address',id:id},
		success:function(html){
			$('#load-edit-dhiachi').html(html);
			$('#exampleModalCenterEdit').modal('show');
		}
	})
}
$('body').on('change', 'input.active_code', function(event) {
	event.preventDefault();
	Cart.SetBuy();
});
$(document).ready(function(e) {
	$('#register-username').bind('keypress', function (event) {
		var regex = new RegExp("^[a-zA-Z0-9 \b\t]+$");
		var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
		if (!regex.test(key)) {
			event.preventDefault();
			return false;
		}
	});
	if($('.overlayloading').length){
		$('body').addClass('is_loader');
		Cart.LoadShip();
	}
	Cart.BuyCart();
	$('body').on('click', '.d-gt a.active', function(event) {
		event.preventDefault();
		$('#checkout-form').submit();
	});
	$(document).on("click",".plus, .minus",function(){
		if(flag==false){
			flag=true;
			var t=e(this).closest(".w_qty_gh").find(".qty"),n=parseFloat(t.val()),r=parseFloat(t.attr("max")),i=parseFloat(t.attr("min")),s=t.attr("step");
			if(!n||n==""||n=="NaN")n=0;
			if(r==""||r=="NaN")r="";if(i==""||i=="NaN")i=0;
			if(s=="any"||s==""||s==undefined||parseFloat(s)=="NaN")s=1;
			e(this).is(".plus")?r&&(r==n||n>r)?t.val(r):t.val(n+parseFloat(s)):i&&(i==n||n<i)?t.val(i):n>0&&t.val(n-parseFloat(s));
			t.trigger("change");
		}
	});
	$('.acctive-diachi a.set-default').click(function(event) {
		var root=$(this);
		var id_user=$(this).data('iduser');
		var id=$(this).data('id');
		$.ajax({
			url: 'ajax/ajax_edit_diachi.php',
			type: 'POST',
			data: {act: 'set-default',id_user:id_user,id:id},
			success:function(){
				window.location.reload();
			}
		})
	});
	$('.col-input-login span').click(function(event) {
		if(!$('.col-input-login span').hasClass('active')){
			$('.col-input-login span').addClass('active');
			$(this).parent('.col-input-login').find('input').attr('type','text');
		}else{
			$('.col-input-login span').removeClass('active');
			$(this).parent('.col-input-login').find('input').attr('type','password');
		}
	});
	$('.owl-carousel-product-detail').owlCarousel({
		loop:false,
		margin:6,
		nav:true,
		dots:false,
		lazyLoad:true,
		autoplay:false,
		responsive:{
			0:{
				items:3
			},
			600:{
				items:4
			},
			1000:{
				items:6
			}
		}
	});
});
function startCarousel(){
	$('.owl-carousel-product-daxem').owlCarousel({
		loop:false,
		margin:6,
		nav:true,
		dots:false,
		lazyLoad:true,
		autoplay:false,
		slideBy:3,
		responsive:{
			0:{
				items:2
			},
			600:{
				items:4
			},
			1000:{
				items:6
			}
		}
	});
	$('.owl-carousel-product-timkiem').owlCarousel({
		loop:false,
		margin:6,
		nav:true,
		dots:false,
		lazyLoad:true,
		autoplay:false,
		slideBy:3,
		responsive:{
			0:{
				items:2
			},
			600:{
				items:4
			},
			1000:{
				items:6
			}
		}
	});
	$('.owl-carousel-danhmuc').owlCarousel({
		loop:false,
		margin:6,
		nav:true,
		dots:false,
		lazyLoad:true,
		autoplay:false,
		slideBy:3,
		responsive:{
			0:{
				items:3
			},
			600:{
				items:4
			},
			1000:{
				items:6
			}
		}
	});
	$('.owl-carousel-list').owlCarousel({
		loop:false,
		margin:6,
		nav:true,
		dots:false,
		autoplay:false,
		lazyLoad:true,
		slideBy:3,
		responsive:{
			0:{
				items:2
			},
			600:{
				items:4
			},
			1000:{
				items:10
			}
		}
	});
}
function stopCarousel() {
	var owl = $('.owl-carousel-product-nomibile');
	owl.trigger('destroy.owl.carousel');
	owl.addClass('off');
}
function scrollToBottom() {
	var messages = document.getElementById('box-chat');
	messages.scrollTop = messages.scrollHeight;
}
function cus_images(){
	$("#filer-gallery").filer({
		limit: 5,
		maxSize: null,
		extensions: ["jpg","gif","png","jpeg","gif","JPG","PNG","JPEG","Png","GIF"],
		changeInput: '<a class="jFiler-input-choose-btn"><img src="images/add_picture.png" alt="Add Images"/></a>',
		showThumbs: true,
		theme: "default",
		templates: {
			box: '<ul class="jFiler-items-list jFiler-items-grid row scroll-bar"></ul>',
			item: '<li class="jFiler-item">\
			<div class="jFiler-item-container">\
			<div class="jFiler-item-inner">\
			<div class="jFiler-item-thumb">\
			{{fi-image}}\
			</div>\
			<div class="jFiler-item-assets jFiler-row">\
			<ul class="list-inline pull-left">\
			<li>{{fi-progressBar}}</li>\
			</ul>\
			<ul class="list-inline pull-right">\
			<li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
			</ul>\
			</div>\
			</div>\
			</div>\
			</li>',
			itemAppend: '<li class="jFiler-item">\
			<div class="jFiler-item-container">\
			<div class="jFiler-item-inner">\
			<div class="jFiler-item-thumb">\
			{{fi-image}}\
			</div>\
			<div class="jFiler-item-assets jFiler-row">\
			<ul class="list-inline pull-left">\
			<li><span class="jFiler-item-others">{{fi-icon}}</span></li>\
			</ul>\
			<ul class="list-inline pull-right">\
			<li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
			</ul>\
			</div>\
			</div>\
			</li>',
			progressBar: '<div class="bar"></div>',
			itemAppendToEnd: true,
			canvasImage: false,
			removeConfirmation: false,
			_selectors: {
				list: '.jFiler-items-list',
				item: '.jFiler-item',
				progressBar: '.bar',
				remove: '.jFiler-item-trash-action'
			}
		},
		afterShow: function(){
			var jFilerItems = $(".my-jFiler-items .jFiler-items-list li.jFiler-item");
			var jFilerItemsLength = 0;
			var jFilerItemsLast = 0;
			if(jFilerItems.length)
			{
				jFilerItemsLength = jFilerItems.length;
				jFilerItemsLast = parseInt(jFilerItems.last().find("input[type=number]").val());
			}
			$(".jFiler-items-list li.jFiler-item").each(function(index){
				var colClass = $(".col-filer").val();
				var parent = $(this).parent();
				if(!parent.is("#jFilerSortable"))
				{
					jFilerItemsLast += 1;
					$(this).find("input[type=number]").val(jFilerItemsLast);
				}
				if(!$(this).hasClass(colClass)) $("li.jFiler-item").addClass(colClass);
			});
		},
		addMore: true,
		allowDuplicates: false,
		clipBoardPaste: false,
		captions: {
			button: "Thêm hình",
			feedback: "Vui lòng chọn hình ảnh",
			feedback2: "Những hình đã được chọn",
			drop: "Kéo hình vào đây để upload",
			removeConfirmation: "Bạn muốn loại bỏ hình ảnh này ?",
			errors: {
				filesLimit: "Chỉ được upload mỗi lần {{fi-limit}} hình ảnh",
				filesType: "Chỉ hỗ trợ tập tin là hình ảnh",
				filesSize: "Hình {{fi-name}} có kích thước quá lớn. Vui lòng upload hình ảnh có kích thước tối đa {{fi-maxSize}} MB.",
				filesSizeAll: "Những hình ảnh bạn chọn có kích thước quá lớn. Vui lòng chọn những hình ảnh có kích thước tối đa {{fi-maxSize}} MB."
			}
		}
	});
}
function doEnter(event,obj)
{
	if(event.keyCode == 13 || event.which == 13) onSearch(obj);
}
function isPhone_fix(str){
	if((str.length==10 && (str.substr(0,2)==08)) ||
		(str.length==10 && (str.substr(0,2)==09)) ||
		(str.length==10 && (str.substr(0,2)==07)) ||
		(str.length==10 && (str.substr(0,2)==05)) ||
		(str.length==10 && (str.substr(0,2)==03))
		)return true;
}
function onSearch(obj)
{
	if($("#"+obj).css('opacity') == 0) {
		$('.wrap-mobile-goiy').addClass('actuve');
	}else{
		var keyword = $("#"+obj).val();
		if(keyword==''){
			alert('Bạn chưa nhập từ khóa tìm kiếm !');
			return false;
		} else {
			location.href = "index.php?com=tim-kiem&keywords="+encodeURI(keyword);
			loadPage(document.location);
		}
	}
}
function Copy() {
	var Url = document.getElementById("url");
	Url.innerHTML  = window.location.href;
	Url.select();
	document.execCommand("copy");
	$('.popup_bottom_morong').toggleClass('active');
}
function copyToClipboard(element) {
	var $temp = $("<input>");
	$("body").append($temp);
	$temp.val($(element).text()).select();
	document.execCommand("copy");
	$temp.remove();
	$('#show_mess').text('Đã copy link liên kết!').show();
	setTimeout(function(){
		$('#show_mess').text('').hide();
	},1500);
}
$(document).ready(function() {
	$('p.xemhanhtrinh').click(function(event) {
		$(this).parent('.tt_tien').next('.show_hanhtrinh').slideToggle();
	});
	$('.slick_photoo_detail:not(.slick-initialized)').slick({
		infinite: false,
		fade:false,
		slidesToShow: 1,
		arrows:false,
		draggable:false,
		slidesToScroll: 1,
	});
	$('.slick_photoo_detail').on('afterChange', function (event, slick, currentSlide) {
		var cl=$(slick.$slides.get(currentSlide)).attr('data-class');
		$('.'+cl).text(currentSlide+1);
	});
	$('.slick_goiy_photo:not(.slick-initialized)').slick({
		infinite: false,
		slidesToShow: 1,
		arrows:false,
		draggable:false,
		slidesToScroll: 1,
	});
	$('.slick_goiy_photo').on('afterChange', function (event, slick, currentSlide) {
		var cl=$(slick.$slides.get(currentSlide)).attr('data-class');
		$('.'+cl).text(currentSlide+1);
	});
	$('a.change_size_sp').click(function(){
		var num_slick=$('.'+$(this).data('slick')).attr('data-slick-index');
		$('.slick_photoo_detail').slick('slickGoTo', num_slick);
		$(this).next('.mz-thumb').click();
		price_size = $(this).attr("rel");
		$(this).addClass('active').siblings().removeClass('active');
		idsize = $(this).data("id");
		$("input[name='idsize']").val(idsize);
		$("input[name='relsize']").val(price_size);
		namesize = '<i> - giá áp dụng cho ' + $("a.change_size_sp.active").attr("data-rel")+'</i>';
		$(".price_load").html(number_format(price_size, 0, '.', '.')+' đ'+namesize);
		$('#price_product_popup').html(number_format(price_size, 0, '.', '.')+' đ <span>Giá áp dụng cho <i>'+$(this).text()+'</i></span>');
		var src=$(this).data('img');
		if(src.length){
			$('.modal-images img').attr('src',src);
			$('.modal-images').show();
		}else{
			$('.modal-images').hide();
		}
	});
	$('#flex_product_detail_chose_size, .close_popup_size_color a, .open-popup, .overlay').click(function(event) {
		$('body').toggleClass('open-tab-modal');
		$('.popup_size_color').toggleClass('active');
		$('.modal-images').hide();
	});
	$('.change_color_sp').click(function(){
		$('.change_color_sp').removeClass('active');
		$(this).addClass('active');
		var src=$(this).data('img');
		if(src.length){
			$('.modal-images img').attr('src',src);
			$('.modal-images').show();
		}
		var num_slick=$('.'+$(this).data('slick')).attr('data-slick-index');
		$('.slick_photoo_detail').slick('slickGoTo', num_slick);
		color = $(this).data('rel');
	});
	$window.scroll(function() {
		$('.popup_bottom_morong').removeClass('active');
	});
	$('.mm-menu-morong,.popup_bottom_morong .click_action a').click(function(event) {
		$('.popup_bottom_morong').toggleClass('active');
	});
	if($('#box-chat').length){
		scrollToBottom();
	}
	if ( $(window).width() > 992 ) {
		startCarousel();
		$('.owl-carousel-product-nomibile').removeClass('off');
	} else {
		$('.owl-carousel-product-nomibile').addClass('off');
	}
	$('body').on('keyup', '.noidungchat', function(e) {
		var order=$('#order_id').val();
		if (e.key === 'Enter' || e.keyCode === 13) {
			if($('.add_content_chat input.noidungchat').val()==''){
				alert('Bạn chưa nhập nội dung khiếu nại !');
				$('.add_content_chat input.noidungchat').focus();
				return false;
			}else{
				var formData = new FormData($(this).parents('form')[0]);
				$.ajax({
					url: 'ajax/upload_chat.php',
					type: 'POST',
					data: formData,
					cache: false,
					async:false,
					contentType: false,
					processData: false,
					xhr: function() {
						var myXhr = $.ajaxSettings.xhr();
						return myXhr;
					},
					success: function (data) {
						$.post("khieu-nai.html&order="+order,function(html){
							$("#chat-cuss").html(html);
							setTimeout(function(){scrollToBottom()},500);
							$('#send_chat').trigger('reset');
							cus_images();
						})
					}
				});
			}
		}
	});
	$('body').on('click', '#send_chat_button', function(event) {
		var order=$('#order_id').val();
		if($('.add_content_chat input.noidungchat').val()==''){
			alert('Bạn chưa nhập nội dung khiếu nại !');
			$('.add_content_chat input.noidungchat').focus();
			return false;
		}else{
			var formData = new FormData($(this).parents('form')[0]);
			$.ajax({
				url: 'ajax/upload_chat.php',
				type: 'POST',
				data: formData,
				cache: false,
				async:false,
				contentType: false,
				processData: false,
				xhr: function() {
					var myXhr = $.ajaxSettings.xhr();
					return myXhr;
				},
				success: function (data) {
					$.post("khieu-nai.html&order="+order,function(html){
						$("#chat-cuss").html(html);
						setTimeout(function(){scrollToBottom()},500);
						$('#send_chat').trigger('reset');
						cus_images();
					})
				}
			});
		}
	});
	cus_images();
});
$(window).resize(function() {
	if ( $(window).width() > 992 ) {
		$('.owl-carousel-product-nomibile').removeClass('off');
		startCarousel();
	} else {
		stopCarousel();
	}
});
if($('#loadding').length){
	$(document).ready(function() {
		var is_busy = false;
		var page = 1;
		var stopped = false;
		$(window).scroll(function() {
			$element = $('#project');
			$loadding = $('#loadding');
			if($(window).scrollTop() + $(window).height() >= $element.height())
			{
				if (is_busy == true){return false;}
				if (stopped == true){return false;}
				is_busy = true;
				page++;
				$loadding.removeClass('d-none');
				$.ajax(
				{
					type        : 'post',
					dataType    : 'text',
					async		:  false,
					url         : 'ajax/load-page-mobile.php',
					data        : {p : page,item:36},
					success     : function (result)
					{
						$element.append(result);
					}
				}).always(function(){
					$loadding.addClass('d-none');
					is_busy = false;
				});
				return false;
			}
		});
	});
}
if($('#loadding1').length){
	$(document).ready(function() {
		var is_busy = false;
		var page = 1;
		var stopped = false;
		var idi = $('#loadding1').data('id');
		$(window).scroll(function() {
			$element = $('#flex_sanpham_mobile');
			$loadding = $('#loadding1');
			if($(window).scrollTop() + $(window).height() >= $element.height())
			{
				if (is_busy == true){return false;}
				if (stopped == true){return false;}
				is_busy = true;
				page++;
				$loadding.removeClass('d-none');
				$.ajax(
				{
					type        : 'get',
					dataType    : 'text',
					async		:  false,
					url         : 'ajax/load_goiy.php',
					data        : {p : page,idi:idi},
					success     : function (result)
					{
						$element.append(result);
						$('.slick_goiy_photo:not(.slick-initialized)').slick({
							infinite: false,
							slidesToShow: 1,
							arrows:false,
							draggable:false,
							slidesToScroll: 1,
						});
						$('.slick_goiy_photo').on('afterChange', function (event, slick, currentSlide) {
							var cl=$(slick.$slides.get(currentSlide)).attr('data-class');
							$('.'+cl).text(currentSlide+1);
						});
					}
				}).always(function(){
					$loadding.addClass('d-none');
					is_busy = false;
				});
				return false;
			}
		});
	});
}

if($('#loadding2').length){
	$(document).ready(function() {
		var is_busy = false;
		var page = 1;
		var stopped = false;
		var id_list = $('#loadding2').data('id-list');
		var id_cat = $('#loadding2').data('id-cat');
		var id_item = $('#loadding2').data('id-item');
		$(window).scroll(function() {
			$element = $('#load_more_product2');
			$loadding = $('#loadding2');
			if($(window).scrollTop() + $(window).height() >= $element.height()) 
			{
				if (is_busy == true){return false;}
				if (stopped == true){return false;}
				is_busy = true;
				page++;
				$loadding.removeClass('d-none');
				$.ajax(
				{
					type        : 'get',
					dataType    : 'text',
					async		:  false,
					url         : 'ajax/ajax_load_more.php',
					data        : {page : page,id_list:id_list,id_cat:id_cat,id_item:id_item},
					success     : function (result)
					{
						$element.append(result);
					}
				}).always(function(){
					$loadding.addClass('d-none');
					is_busy = false;
				});
				return false;
			}
		});
	});
}

$(document).ready(function() {
	$('body').append('<div id="gotop"><i class="fa fa-chevron-up"></i></div>');
	$(window).scroll(function() {
		if($(window).scrollTop() > 100) {
			$('#gotop').css({right:'15px'});
		} else {
			$('#gotop').css({right:'-55px'});
		}
	});
	$('#gotop').click(function() {
		$('html, body').animate({scrollTop:0},500);
	});
});