<link href="../res/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<script src="../res/js/jquery.js" type="text/javascript"></script>
<link href="../res/default/css/index.css" rel="stylesheet" />
<script>
	$(document).ready(function(){
		curvcode = "";
		$.ajax({
			url: '/Ajax/Games/getVoucher',
			method: 'post',
			data: {},
			dataType: 'json',
			success: function(voucher){
				curvcode = voucher.qq[0]['VoucherCode'];
			}
		});

		$.ajax({
			url: '/Ajax/Games/getGames',
			method: 'post',
			data: {},
			dataType: 'json',
			success: function(games){
				showgames(games);
			}
		});

		function showgames(games){
			var fbl = 0;
			var bbl = 0;
			var fb = games['fb'];
			var bb = games['bb'];
			if(fb != null){
				fbl = fb.length;
			}
			if(bb != null){
				bbl = bb.length;
			}
			
			var fbh = Math.floor(fbl / 2);
			var bbh = Math.floor(bbl / 2);
			for(i = 0; i < fbl; i++){
				var rescolor = '';
				var gamedate = new Date(fb[i]['GameTime']);
				var mo = gamedate.getMonth() + 1;
				var d = gamedate.getDate();
				var h = gamedate.getHours();
				var mi = gamedate.getMinutes();
				function getrc(drc){
                    var rc = ""
                    if(drc == undefined || drc == null || drc == ""){
                        rc = "免费推荐加 微信 : <span class='wcc'></span>";
                    }else{
                        rc = drc;
                    }
                    return rc;
				}
				if(mo < 10){
					mo = '0'+mo;
				}
				if(d < 10){
					d = '0'+d;
				}
				if(h < 10){
					h = '0'+h;
				}
				if(mi < 10){
					mi = '0'+mi;
				}

				if(fb[i]['GameResult'] == '待'){
					rescolor = 'waitres';
				}else if(fb[i]['GameResult'] == '赢'){
					rescolor = 'winres';
				}else{
					rescolor = 'loseres';
				}

				if(i === fbh){
					if(i % 2 === 0){
						$('#zuqiu table tbody').append(
							'<tr>'+
								'<td class="zise" >'+fb[i]['GameName']+' '+mo+'-'+d+' '+h+':'+mi+'</td>'+
								'<td>'+fb[i]['UpperTeam']+'</td>'+
								'<td>'+fb[i]['Handicap']+'</td>'+
								'<td>'+fb[i]['LowerTeam']+'</td>'+
								'<td>'+getrc(fb[i]['RecommendedTeam'])+'</td>'+
								'<td>'+fb[i]['GameScore']+'</td>'+
								'<td class="'+rescolor+'">'+fb[i]['GameResult']+'</td>'+
								'<td><a href="tencent://AddContact/?fromId=50&fromSubId=1&subcmd=all&uin='+ curvcode +'" class="fense"><img src="statics/default/images/ico-qq.gif" /></a></td>'+
								'<td><span class="shidan cd-popup-trigger0" rel="../../Public/res/'+fb[i]['ResultImage']+'">实单</span></td>'+
							'</tr>'+
							'<tr style="background-color:#D4F4FF">'+
								'<td style="height:65px;" colspan="9">'+
								'<p><span style="color: rgb(95, 73, 122);"><strong>博盈分析专家</strong>'+
								'</span><span style="color: rgb(192, 0, 0);"><strong>QQ:<span style="color: rgb(192, 0, 0); background-color: rgb(255, 255, 0);" class="qqc"></span>&nbsp;<strong>&nbsp;</strong>微信:<span style="background-color: rgb(255, 255, 0);" class="wcc"></span></strong></span><strong><strong style="white-space: normal;">【</strong>初盘】 </strong><strong>【临场盘】 【绝对免费】</strong></p></td>'+
							'</tr>'
						);
					}else{
						$('#zuqiu table tbody').append(
							'<tr style="background-color:#D4F4FF">'+
								'<td class="zise" >'+fb[i]['GameName']+' '+mo+'-'+d+' '+h+':'+mi+'</td>'+
								'<td>'+fb[i]['UpperTeam']+'</td>'+
								'<td>'+fb[i]['Handicap']+'</td>'+
								'<td>'+fb[i]['LowerTeam']+'</td>'+
								'<td>'+getrc(fb[i]['RecommendedTeam'])+'</td>'+
								'<td>'+fb[i]['GameScore']+'</td>'+
								'<td class="'+rescolor+'">'+fb[i]['GameResult']+'</td>'+
								'<td><a href="tencent://AddContact/?fromId=50&fromSubId=1&subcmd=all&uin='+ curvcode +'" class="fense"><img src="statics/default/images/ico-qq.gif" /></a></td>'+
								'<td><span class="shidan cd-popup-trigger0" rel="../../Public/res/'+fb[i]['ResultImage']+'">实单</span></td>'+
							'</tr>'+
							'<tr style="background-color:#D4F4FF">'+
								'<td style="height:65px;" colspan="9">'+
								'<p><span style="color: rgb(95, 73, 122);"><strong>博盈分析专家</strong>'+
								'</span><span style="color: rgb(192, 0, 0);"><strong>QQ:<span style="color: rgb(192, 0, 0); background-color: rgb(255, 255, 0);" class="qqc"></span>&nbsp;<strong>&nbsp;</strong>微信:<span style="background-color: rgb(255, 255, 0);" class="wcc"></span></strong></span><strong><strong style="white-space: normal;">【</strong>初盘】 </strong><strong>【临场盘】 【绝对免费】</strong></p></td>'+
							'</tr>'
						);
					}
					
				}else{
					if(i % 2 === 0){
						$('#zuqiu table tbody').append(
							'<tr>'+
								'<td class="zise" >'+fb[i]['GameName']+' '+mo+'-'+d+' '+h+':'+mi+'</td>'+
								'<td>'+fb[i]['UpperTeam']+'</td>'+
								'<td>'+fb[i]['Handicap']+'</td>'+
								'<td>'+fb[i]['LowerTeam']+'</td>'+
								'<td>'+getrc(fb[i]['RecommendedTeam'])+'</td>'+
								'<td>'+fb[i]['GameScore']+'</td>'+
								'<td class="'+rescolor+'">'+fb[i]['GameResult']+'</td>'+
								'<td><a href="tencent://AddContact/?fromId=50&fromSubId=1&subcmd=all&uin='+ curvcode +'" class="fense"><img src="statics/default/images/ico-qq.gif" /></a></td>'+
								'<td><span class="shidan cd-popup-trigger0" rel="../../Public/res/'+fb[i]['ResultImage']+'">实单</span></td>'+
							'</tr>'
						);
					}else{
						$('#zuqiu table tbody').append(
							'<tr style="background-color:#D4F4FF">'+
								'<td class="zise" >'+fb[i]['GameName']+' '+mo+'-'+d+' '+h+':'+mi+'</td>'+
								'<td>'+fb[i]['UpperTeam']+'</td>'+
								'<td>'+fb[i]['Handicap']+'</td>'+
								'<td>'+fb[i]['LowerTeam']+'</td>'+
								'<td>'+getrc(fb[i]['RecommendedTeam'])+'</td>'+
								'<td>'+fb[i]['GameScore']+'</td>'+
								'<td class="'+rescolor+'">'+fb[i]['GameResult']+'</td>'+
								'<td><a href="tencent://AddContact/?fromId=50&fromSubId=1&subcmd=all&uin='+ curvcode +'" class="fense"><img src="statics/default/images/ico-qq.gif" /></a></td>'+
								'<td><span class="shidan cd-popup-trigger0" rel="../../Public/res/'+fb[i]['ResultImage']+'">实单</span></td>'+
							'</tr>'
						);
					}
				}
			}
		
			for(i = 0; i < bbl; i++){
				var gamedate = new Date(bb[i]['GameTime']);
				var mo = gamedate.getMonth() + 1;
				var d = gamedate.getDate();
				var h = gamedate.getHours();
				var mi = gamedate.getMinutes();
				function getrc(drc){
                    var rc = ""
                    if(drc == undefined || drc == null || drc == ""){
                        rc = "免费推荐加 微信 : <span class='wcc'></span>";
                    }else{
                        rc = drc;
                    }
                    return rc;
				}
				if(mo < 10){
					mo = '0'+mo;
				}
				if(d < 10){
					d = '0'+d;
				}
				if(h < 10){
					h = '0'+h;
				}
				if(mi < 10){
					mi = '0'+mi;
				}

				if(bb[i]['GameResult'] == '待'){
					rescolor = 'waitres';
				}else if(bb[i]['GameResult'] == '赢'){
					rescolor = 'winres';
				}else{
					rescolor = 'loseres';
				}

				if(i === bbh){
					if(i % 2 === 0){
						$('#lanqiu table tbody').append(
							'<tr>'+
								'<td class="zise" >'+bb[i]['GameName']+' '+mo+'-'+d+' '+h+':'+mi+'</td>'+
								'<td>'+bb[i]['UpperTeam']+'</td>'+
								'<td>'+bb[i]['Handicap']+'</td>'+
								'<td>'+bb[i]['LowerTeam']+'</td>'+
								'<td>'+getrc(bb[i]['RecommendedTeam'])+'</td>'+
								'<td>'+bb[i]['GameScore']+'</td>'+
								'<td class="'+rescolor+'">'+bb[i]['GameResult']+'</td>'+
								'<td><a href="tencent://AddContact/?fromId=50&fromSubId=1&subcmd=all&uin='+ curvcode +'" class="fense"><img src="statics/default/images/ico-qq.gif" /></a></td>'+
								'<td><span class="shidan cd-popup-trigger0" rel="../../Public/res/'+bb[i]['ResultImage']+'">实单</span></td>'+
							'</tr>'+
							'<tr style="background-color:#D4F4FF">'+
								'<td style="height:65px;" colspan="9">'+
								'<p><span style="color: rgb(95, 73, 122);"><strong>博盈分析专家</strong>'+
								'</span><span style="color: rgb(192, 0, 0);"><strong>QQ:<span style="color: rgb(192, 0, 0); background-color: rgb(255, 255, 0);" class="qqc"></span>&nbsp;<strong>&nbsp;</strong>微信:<span style="background-color: rgb(255, 255, 0);" class="wcc"></span></strong></span><strong><strong style="white-space: normal;">【</strong>初盘】 </strong><strong>【临场盘】 【绝对免费】</strong></p></td>'+
							'</tr>'
						);
					}else{
						$('#lanqiu table tbody').append(
							'<tr style="background-color:#D4F4FF">'+
								'<td class="zise" >'+bb[i]['GameName']+' '+mo+'-'+d+' '+h+':'+mi+'</td>'+
								'<td>'+bb[i]['UpperTeam']+'</td>'+
								'<td>'+bb[i]['Handicap']+'</td>'+
								'<td>'+bb[i]['LowerTeam']+'</td>'+
								'<td>'+getrc(bb[i]['RecommendedTeam'])+'</td>'+
								'<td>'+bb[i]['GameScore']+'</td>'+
								'<td class="'+rescolor+'">'+bb[i]['GameResult']+'</td>'+
								'<td><a href="tencent://AddContact/?fromId=50&fromSubId=1&subcmd=all&uin='+ curvcode +'" class="fense"><img src="statics/default/images/ico-qq.gif" /></a></td>'+
								'<td><span class="shidan cd-popup-trigger0" rel="../../Public/res/'+bb[i]['ResultImage']+'">实单</span></td>'+
							'</tr>'+
							'<tr style="background-color:#D4F4FF">'+
								'<td style="height:65px;" colspan="9">'+
								'<p><span style="color: rgb(95, 73, 122);"><strong>博盈分析专家</strong>'+
								'</span><span style="color: rgb(192, 0, 0);"><strong>QQ:<span style="color: rgb(192, 0, 0); background-color: rgb(255, 255, 0);" class="qqc"></span>&nbsp;<strong>&nbsp;</strong>微信:<span style="background-color: rgb(255, 255, 0);" class="wcc"></span></strong></span><strong><strong style="white-space: normal;">【</strong>初盘】 </strong><strong>【临场盘】 【绝对免费】</strong></p></td>'+
							'</tr>'
						);
					}
					
				}else{
					if(i % 2 === 0){
						$('#lanqiu table tbody').append(
							'<tr>'+
								'<td class="zise" >'+bb[i]['GameName']+' '+mo+'-'+d+' '+h+':'+mi+'</td>'+
								'<td>'+bb[i]['UpperTeam']+'</td>'+
								'<td>'+bb[i]['Handicap']+'</td>'+
								'<td>'+bb[i]['LowerTeam']+'</td>'+
								'<td>'+getrc(bb[i]['RecommendedTeam'])+'</td>'+
								'<td>'+bb[i]['GameScore']+'</td>'+
								'<td class="'+rescolor+'">'+bb[i]['GameResult']+'</td>'+
								'<td><a href="tencent://AddContact/?fromId=50&fromSubId=1&subcmd=all&uin='+ curvcode +'" class="fense"><img src="statics/default/images/ico-qq.gif" /></a></td>'+
								'<td><span class="shidan cd-popup-trigger0" rel="../../Public/res/'+bb[i]['ResultImage']+'">实单</span></td>'+
							'</tr>'
						);
					}else{
						$('#lanqiu table tbody').append(
							'<tr style="background-color:#D4F4FF">'+
								'<td class="zise" >'+bb[i]['GameName']+' '+mo+'-'+d+' '+h+':'+mi+'</td>'+
								'<td>'+bb[i]['UpperTeam']+'</td>'+
								'<td>'+bb[i]['Handicap']+'</td>'+
								'<td>'+bb[i]['LowerTeam']+'</td>'+
								'<td>'+getrc(bb[i]['RecommendedTeam'])+'</td>'+
								'<td>'+bb[i]['GameScore']+'</td>'+
								'<td class="'+rescolor+'">'+bb[i]['GameResult']+'</td>'+
								'<td><a href="tencent://AddContact/?fromId=50&fromSubId=1&subcmd=all&uin='+ curvcode +'" class="fense"><img src="statics/default/images/ico-qq.gif" /></a></td>'+
								'<td><span class="shidan cd-popup-trigger0" rel="../../Public/res/'+bb[i]['ResultImage']+'">实单</span></td>'+
							'</tr>'
						);
					}
				}
			}
		}
	});
	</script>
		<div id="myCarousel" class="carousel slide">	
			<div class="carousel-inner">
				<img src="./statics/default/images/pc/carobg.png" alt="">
		    </div>  
		</div>

		<div class="beijing">
			<div id="content">
				<div id="dbiaoti">
					<div class="dbiaoti_l" style="margin-left:50px;">
						<p><span class="blue">给梦想一个机会 ，给未来一种可能</span></p>
						<p><span class="blue">博盈推荐，带您收入翻番</span></p>
						<p><span class="blue">重磅赛事，免费大公开</span></p>
						<p><span class="blue">更多精彩赛事请添加高手QQ、微信交流咨询！</span></p>
						<p><span class="red">QQ: </span><span class="red qqc"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="red">微信号：</span><span class="red wcc wc"></span></p>
					</div>
					<div class="dbiaoti_r" style="margin-left:-80px;">
						<img style="width:175px; margin-right:15px;" alt="" class="qqcode">
						<img style="width:175px; margin-right:15px;" alt="微信二维码" class="wccode">
						<p style="font-size:24px;font-weight:bold;color:#fff;">盘王推荐，扫码加好友</p>
					</div>
				</div>
				<!-- <div>
					<a target="_blank" href="http://www.ac9393.com/"><img src="statics/default/images/xinzeng/100290.gif"/></a>
				</div> -->
					<div><a href="../history.php?g=fb" target="_blank"><img src="statics/default/images/pc/fbbg.png"/></a>
				</div>
				<div  class="right">
					<div id="zuqiu">
						<table class="table" cellpadding="0" cellspacing="0" style="font-size:16px;margin-bottom:0px;">
							<thead>
								<tr>
									<th>开盘时间</th>
									<th>上盘球队</th>
									<th>盘口</th>
									<th>下盘球队</th>
									<th>免费推荐</th>
									<th>比分</th>
									<th>结果</th>
									<th>分析</th>
									<th>下注</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
					<!-- <div><a target="_blank" href="http://www.ac9393.com/"><img src="statics/default/images/xinzeng/100290.gif"  /></a></div> -->
					<div style="margin-top: 20px;"><a href="../history.php?g=bb" target="_blank"><img src="statics/default/images/pc/bbbg.png"/></a></div>
					<div id="lanqiu">
						<table class="table" cellpadding="0" cellspacing="0" style="font-size:16px;">
							<thead>
								<tr>
									<th>开盘时间</th>
									<th>上盘球队</th>
									<th>盘口</th>
									<th>下盘球队</th>
									<th>免费推荐</th>
									<th>比分</th>
									<th>结果</th>
									<th>分析</th>
									<th>下注</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		<div class="cd-popup">
			<div class="cd-popup-container">
				<p style="padding:10px 0;background-color:#02811A;font-size:18px;font-weight:bold;color:#fff;">实单分析</p>
				<div class="cd-buttons">
				
				</div>
				<a href="#0" class="cd-popup-close">close</a>
			</div>
		</div>
		<!-- <div class="xiazai" style="left:0;top:169px;position:fixed;"><img class="wws" style="width:125px;"></div> -->
		<div class="erweiimg erweiimg_left"><a><img class="ac"></a></div>
		<!-- <div class="xiazai"style="right:3px;top:169px;position:fixed;"><img class="wws" style="width:125px;" ></div> -->
		<div class="erweiimg erweiimg_right"><a><img class="ac"></a></div>

		<script>

			function AddFavorite(title,url){ 
				try{
					window.external.addFavorite(url,title); 
				} 
				catch(e){ 
				try{ 
					window.sidebar.addPanel(title,url,""); 
				} 
				catch(e){ 
				alert("抱歉，您所使用的浏览器无法完成此操作。\n\n请使用快捷键Ctrl+D进行添加！"); 
				} 
				} 
			}
			function SetHome(obj,vrl){
				try
				{            
					obj.style.behavior='url(#default#homepage)';obj.setHomePage(vrl);	
				}
				catch(e){
					if(window.netscape) {
							try {
									netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect"); 
							} 
							catch (e) { 
									alert("此操作被浏览器拒绝！\n请在浏览器地址栏输入“about:config”并回车\n然后将[signed.applets.codebase_principal_support]设置为'true'"); 
							}
							var prefs = Components.classes['@mozilla.org/preferences-service;1'].getService(Components.interfaces.nsIPrefBranch);
							prefs.setCharPref('browser.startup.homepage',vrl);
					}
				}
			}
			
			$(function(){

				//打开窗口
				$('.cd-popup-trigger0').live('click', function(event){
					event.preventDefault();
					$('.cd-popup').addClass('is-visible');
					var src = $(this).attr('rel');
					if(src == "../../Public/res/null" || src == "../../Public/res/"){
						var wc = $('.wc').text();
						$('.cd-buttons').html('');
						$('.cd-buttons').append('<p style="font-size:18px;margin-top:20px;"><p>添加亚盘分析微信：<span style="background-color: rgb(255, 255, 0);" class="wc">'+wc+'</span><strong style="color: rgb(192, 0, 0);">&nbsp;</strong>点击立即注册亚盘合作网站&nbsp;</p></p>');                   
					}else{
						$('.cd-buttons').html('');
						$('.cd-buttons').append('<p style="margin-top:20px;"><img style="width:100%;" src="'+src+'" /></p><p>点击立即注册亚盘合作网站</p>');
					}
					//$(".dialog-addquxiao").hide()
				});
				//关闭窗口
				$('.cd-popup').on('click', function(event){
					if( $(event.target).is('.cd-popup-close') || $(event.target).is('.cd-popup') ) {
						$('.cd-buttons').empty();
						event.preventDefault();
						$(this).removeClass('is-visible');
					}
				});
				//ESC关闭
				$(document).keyup(function(event){
					if(event.which=='27'){
						$('.cd-popup').removeClass('is-visible');
					}
				});
				
			})
		</script>
		<script src="statics/comment/animateBackground-plugin.js"></script>
		<script src="statics/comment/common.js"></script>
		<script>
			$(document).ready(function(){

				var curvcode = "";
				$.ajax({
					url: '/Ajax/Games/getVoucher',
					method: 'post',
					data: {},
					dataType: 'json',
					success: function(voucher){
						$('.qqc').text(voucher.qq[0]['VoucherCode']);
						$('.wcc').text(voucher.wc[0]['VoucherCode']);
						curvcode = voucher.wc[0]['VoucherCode'];
					}
				});

				$.ajax({
					url: '/Ajax/Games/getQr',
					method: 'post',
					data: {},
					dataType: 'json',
					success: function(qr){
						var tempqc = 0;
						var tempwc = 0;
						var tempac = 0;
						if(qr.qqc != null){
							tempqc = qr.qqc.length;
						}
						if(qr.wcc != null){
							tempwc = qr.wcc.length;
						}
						if(qr.ac != null){
							tempac = qr.ac.length;
						}

						if(tempqc){
							$('.qqcode').attr('src','../../Public/qr/'+qr.qqc[0]['QrImage']);
						}
						if(tempwc){
							$('.wccode').attr('src','../../Public/qr/'+qr.wcc[0]['QrImage']);
						}
						if(tempac){
							$('.ac').attr('src','../../Public/qr/'+qr.ac[0]['QrImage']);
						}
						
					}
				});
			});
			$(function(){
				var window_height = $(window).height();
				var erweiimg_height = $(".erweiimg").height();
				var top = (window_height-erweiimg_height)/2-100;
			console.log(top);
				$(".erweiimg").css("top",top+"px");
				$(".xiazai").css("top",top-129+"px");
			
			})
			fn.showNum(fn.countDay('2018/06/15'))
		</script>
		<div style="display:none;">
		<script language="javascript" src="http://count4.51yes.com/click.aspx?id=41342228&amp;logo=1" charset="gb2312"></script>
		</div>