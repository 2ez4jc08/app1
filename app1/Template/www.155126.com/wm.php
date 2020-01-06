<script src="../res/js/jquery.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="../res/default/css/iconfont.css">
<link href="../res/default/css/wm.css" rel="stylesheet" />
<script>
	$(document).ready(function(){
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
			
			var fb = games['fb'];
			var bb = games['bb'];
			var fbl = fb.length;
			var bbl = bb.length;
			var fbpm = fb.length - 1;
			var bbpm = bb.length - 1;
			// var fbh = Math.floor(fbl / 2);
			// var bbh = Math.floor(bbl / 2);
			for(i = 0; i < fbl; i++){
				var gamedate = new Date(fb[i]['GameTime']);
				var mo = gamedate.getMonth() + 1;
				var d = gamedate.getDate();
				var h = gamedate.getHours();
				var mi = gamedate.getMinutes();
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
				function getrc(drc){
                    var rc = ""
                    if(drc == undefined || drc == null || drc == ""){
                        rc = "免费推荐加 微信 : <span class='wcc'></span>";
                    }else{
                        rc = drc;
                    }
                    return rc;
				}
				if(fb[i]['GameResult'] == '待'){
					rescolor = 'waitres';
				}else if(fb[i]['GameResult'] == '赢'){
					rescolor = 'winres';
				}else{
					rescolor = 'loseres';
				}
				
				if(i === 5){
					if(i % 2 === 0){
						$('#zuqiu table tbody').append(
							'<tr>'+
								'<td style="padding:10px 0;">'+fb[i]['GameName']+' '+mo+'-'+d+' '+h+':'+mi+'</td>'+
								'<td>'+
									'<p>'+fb[i]['UpperTeam']+'</p>'+
									'<hr style="border:none;border-bottom:1px solid #DACA58">'+
									'<p>'+fb[i]['LowerTeam']+'</p>'+
								'</td>'+
								'<td>'+fb[i]['Handicap']+'</td>'+
								'<td class="mftj">'+getrc(fb[i]['RecommendedTeam'])+'</td>'+
								'<td>'+fb[i]['GameScore']+'</td>'+
								'<td class="'+rescolor+'">'+fb[i]['GameResult']+'</td>'+
								'<td>'+
								'<span class="shidan cd-popup-trigger0" rel="../../Public/res/'+fb[i]['ResultImage']+'">实单</span>'+
								'</td>'+
							'</tr>'+
							'<tr> '+
								'<td style="height:65px; background-color:#D4F4FF;" colspan="9">'+
								'<p><span style="color: rgb(95, 73, 122);"><strong>博盈分析专家</strong>'+
								'</span><span style="color: rgb(192, 0, 0);"><strong>QQ:<span style="color: rgb(192, 0, 0); background-color: rgb(255, 255, 0);" class="qqc"></span>&nbsp;<strong>&nbsp;</strong>微信:<span style="background-color: rgb(255, 255, 0);" class="wcc"></span></strong></span><strong><strong style="white-space: normal;">【</strong>初盘】 </strong><strong>【临场盘】 【绝对免费】</strong></p></td>'+
							'</tr>'
						);
					}else{
						$('#zuqiu table tbody').append(
							'<tr>'+
								'<td style="padding:10px 0;">'+fb[i]['GameName']+' '+mo+'-'+d+' '+h+':'+mi+'</td>'+
								'<td>'+
									'<p>'+fb[i]['UpperTeam']+'</p>'+
									'<hr style="border:none;border-bottom:1px solid #DACA58">'+
									'<p>'+fb[i]['LowerTeam']+'</p>'+
								'</td>'+
								'<td>'+fb[i]['Handicap']+'</td>'+
								'<td class="mftj">'+getrc(fb[i]['RecommendedTeam'])+'</td>'+
								'<td>'+fb[i]['GameScore']+'</td>'+
								'<td class="'+rescolor+'">'+fb[i]['GameResult']+'</td>'+
								'<td>'+
								'<span class="shidan cd-popup-trigger0" rel="../../Public/res/'+fb[i]['ResultImage']+'">实单</span>'+
								'</td>'+
							'</tr>'+
							'<tr> '+
								'<td style="height:65px; background-color:#D4F4FF;" colspan="9">'+
								'<p><span style="color: rgb(95, 73, 122);"><strong>博盈分析专家</strong>'+
								'</span><span style="color: rgb(192, 0, 0);"><strong>QQ:<span style="color: rgb(192, 0, 0); background-color: rgb(255, 255, 0);" class="qqc"></span>&nbsp;<strong>&nbsp;</strong>微信:<span style="background-color: rgb(255, 255, 0);" class="wcc"></span></strong></span><strong><strong style="white-space: normal;">【</strong>初盘】 </strong><strong>【临场盘】 【绝对免费】</strong></p></td>'+
							'</tr>'
						);
					}
					
				}else if(i === fbpm){
					if(i % 2 === 0){
						$('#zuqiu table tbody').append(
							'<tr>'+
								'<td style="padding:10px 0;">'+fb[i]['GameName']+' '+mo+'-'+d+' '+h+':'+mi+'</td>'+
								'<td>'+
									'<p>'+fb[i]['UpperTeam']+'</p>'+
									'<hr style="border:none;border-bottom:1px solid #DACA58">'+
									'<p>'+fb[i]['LowerTeam']+'</p>'+
								'</td>'+
								'<td>'+fb[i]['Handicap']+'</td>'+
								'<td class="mftj">'+getrc(fb[i]['RecommendedTeam'])+'</td>'+
								'<td>'+fb[i]['GameScore']+'</td>'+
								'<td class="'+rescolor+'">'+fb[i]['GameResult']+'</td>'+
								'<td>'+
								'<span class="shidan cd-popup-trigger0" rel="../../Public/res/'+fb[i]['ResultImage']+'">实单</span>'+
								'</td>'+
							'</tr>'+
							'<tr> style="background-color:#D4F4FF;">'+
								'<td style="padding:10px 0;" colspan="9"><a href="../history.php?g=fb">历史记录</a></td>'+
							'</tr>'
						);
					}else{
						$('#zuqiu table tbody').append(
							'<tr>'+
								'<td style="padding:10px 0;">'+fb[i]['GameName']+' '+mo+'-'+d+' '+h+':'+mi+'</td>'+
								'<td>'+
									'<p>'+fb[i]['UpperTeam']+'</p>'+
									'<hr style="border:none;border-bottom:1px solid #DACA58">'+
									'<p>'+fb[i]['LowerTeam']+'</p>'+
								'</td>'+
								'<td>'+fb[i]['Handicap']+'</td>'+
								'<td class="mftj">'+getrc(fb[i]['RecommendedTeam'])+'</td>'+
								'<td>'+fb[i]['GameScore']+'</td>'+
								'<td class="'+rescolor+'">'+fb[i]['GameResult']+'</td>'+
								'<td>'+
								'<span class="shidan cd-popup-trigger0" rel="../../Public/res/'+fb[i]['ResultImage']+'">实单</span>'+
								'</td>'+
							'</tr>'+
							'<tr> style="background-color:#D4F4FF;">'+
								'<td style="padding:10px 0;" colspan="9"><a href="../history.php?g=fb">历史记录</a></td>'+
							'</tr>'
						);
					}
				}else{
					if(i % 2 === 0){
						$('#zuqiu table tbody').append(
							'<tr>'+
								'<td style="padding:10px 0;">'+fb[i]['GameName']+' '+mo+'-'+d+' '+h+':'+mi+'</td>'+
								'<td>'+
									'<p>'+fb[i]['UpperTeam']+'</p>'+
									'<hr style="border:none;border-bottom:1px solid #DACA58">'+
									'<p>'+fb[i]['LowerTeam']+'</p>'+
								'</td>'+
								'<td>'+fb[i]['Handicap']+'</td>'+
								'<td class="mftj">'+getrc(fb[i]['RecommendedTeam'])+'</td>'+
								'<td>'+fb[i]['GameScore']+'</td>'+
								'<td class="'+rescolor+'">'+fb[i]['GameResult']+'</td>'+
								'<td>'+
								'<span class="shidan cd-popup-trigger0" rel="../../Public/res/'+fb[i]['ResultImage']+'">实单</span>'+
								'</td>'+
							'</tr>'
						);
					}else{
						$('#zuqiu table tbody').append(
							'<tr>'+
								'<td style="padding:10px 0;">'+fb[i]['GameName']+' '+mo+'-'+d+' '+h+':'+mi+'</td>'+
								'<td>'+
									'<p>'+fb[i]['UpperTeam']+'</p>'+
									'<hr style="border:none;border-bottom:1px solid #DACA58">'+
									'<p>'+fb[i]['LowerTeam']+'</p>'+
								'</td>'+
								'<td>'+fb[i]['Handicap']+'</td>'+
								'<td class="mftj">'+getrc(fb[i]['RecommendedTeam'])+'</td>'+
								'<td>'+fb[i]['GameScore']+'</td>'+
								'<td class="'+rescolor+'">'+fb[i]['GameResult']+'</td>'+
								'<td>'+
								'<span class="shidan cd-popup-trigger0" rel="../../Public/res/'+fb[i]['ResultImage']+'">实单</span>'+
								'</td>'+
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
				function getrc(drc){
                    var rc = ""
                    if(drc == undefined || drc == null || drc == ""){
                        rc = "免费推荐加 微信 : <span class='wcc'></span>";
                    }else{
                        rc = drc;
                    }
                    return rc;
				}

				if(bb[i]['GameResult'] == '待'){
					rescolor = 'waitres';
				}else if(bb[i]['GameResult'] == '赢'){
					rescolor = 'winres';
				}else{
					rescolor = 'loseres';
				}

				if(i === 5){
					if(i % 2 === 0){
						$('#lanqiu table tbody').append(
							'<tr>'+
								'<td style="padding:10px 0;">'+bb[i]['GameName']+' '+mo+'-'+d+' '+h+':'+mi+'</td>'+
								'<td>'+
									'<p>'+bb[i]['UpperTeam']+'</p>'+
									'<hr style="border:none;border-bottom:1px solid #DACA58">'+
									'<p>'+bb[i]['LowerTeam']+'</p>'+
								'</td>'+
								'<td>'+bb[i]['Handicap']+'</td>'+
								'<td class="mftj">'+getrc(bb[i]['RecommendedTeam'])+'</td>'+
								'<td>'+bb[i]['GameScore']+'</td>'+
								'<td class="'+rescolor+'">'+bb[i]['GameResult']+'</td>'+
								'<td>'+
									'<span class="shidan cd-popup-trigger0" rel="../../Public/res/'+bb[i]['ResultImage']+'">实单</span>'+
								'</td>'+
							'</tr>'+
							'<tr> '+
								'<td style="height:65px; background-color:#D4F4FF;" colspan="9">'+
								'<p><span style="color: rgb(95, 73, 122);"><strong>博盈分析专家</strong>'+
								'</span><span style="color: rgb(192, 0, 0);"><strong>QQ:<span style="color: rgb(192, 0, 0); background-color: rgb(255, 255, 0);" class="qqc"></span>&nbsp;<strong>&nbsp;</strong>微信:<span style="background-color: rgb(255, 255, 0);" class="wcc"></span></strong></span><strong><strong style="white-space: normal;">【</strong>初盘】 </strong><strong>【临场盘】 【绝对免费】</strong></p></td>'+
							'</tr>'
						);
					}else{
						$('#lanqiu table tbody').append(
							'<tr>'+
								'<td style="padding:10px 0;">'+bb[i]['GameName']+' '+mo+'-'+d+' '+h+':'+mi+'</td>'+
								'<td>'+
									'<p>'+bb[i]['UpperTeam']+'</p>'+
									'<hr style="border:none;border-bottom:1px solid #DACA58">'+
									'<p>'+bb[i]['LowerTeam']+'</p>'+
								'</td>'+
								'<td>'+bb[i]['Handicap']+'</td>'+
								'<td class="mftj">'+getrc(bb[i]['RecommendedTeam'])+'</td>'+
								'<td>'+bb[i]['GameScore']+'</td>'+
								'<td class="'+rescolor+'">'+bb[i]['GameResult']+'</td>'+
								'<td>'+
									'<span class="shidan cd-popup-trigger0" rel="../../Public/res/'+bb[i]['ResultImage']+'">实单</span>'+
								'</td>'+
							'</tr>'+
							'<tr> '+
								'<td style="height:65px; background-color:#D4F4FF;" colspan="9">'+
								'<p><span style="color: rgb(95, 73, 122);"><strong>博盈分析专家</strong>'+
								'</span><span style="color: rgb(192, 0, 0);"><strong>QQ:<span style="color: rgb(192, 0, 0); background-color: rgb(255, 255, 0);" class="qqc"></span>&nbsp;<strong>&nbsp;</strong>微信:<span style="background-color: rgb(255, 255, 0);" class="wcc"></span></strong></span><strong><strong style="white-space: normal;">【</strong>初盘】 </strong><strong>【临场盘】 【绝对免费】</strong></p></td>'+
							'</tr>'
						);
					}
					
				}else if(i === bbpm){
					if(i % 2 === 0){
						$('#lanqiu table tbody').append(
							'<tr>'+
								'<td style="padding:10px 0;">'+bb[i]['GameName']+' '+mo+'-'+d+' '+h+':'+mi+'</td>'+
								'<td>'+
									'<p>'+bb[i]['UpperTeam']+'</p>'+
									'<hr style="border:none;border-bottom:1px solid #DACA58">'+
									'<p>'+bb[i]['LowerTeam']+'</p>'+
								'</td>'+
								'<td>'+bb[i]['Handicap']+'</td>'+
								'<td class="mftj">'+getrc(bb[i]['RecommendedTeam'])+'</td>'+
								'<td>'+bb[i]['GameScore']+'</td>'+
								'<td class="'+rescolor+'">'+bb[i]['GameResult']+'</td>'+
								'<td>'+
									'<span class="shidan cd-popup-trigger0" rel="../../Public/res/'+bb[i]['ResultImage']+'">实单</span>'+
								'</td>'+
							'</tr>'+
							'<tr> style="background-color:#D4F4FF;">'+
								'<td style="padding:10px 0;" colspan="9"><a href="../history.php?g=bb">历史记录</a></td>'+
							'</tr>'
						);
					}else{
						$('#lanqiu table tbody').append(
							'<tr>'+
								'<td style="padding:10px 0;">'+bb[i]['GameName']+' '+mo+'-'+d+' '+h+':'+mi+'</td>'+
								'<td>'+
									'<p>'+bb[i]['UpperTeam']+'</p>'+
									'<hr style="border:none;border-bottom:1px solid #DACA58">'+
									'<p>'+bb[i]['LowerTeam']+'</p>'+
								'</td>'+
								'<td>'+bb[i]['Handicap']+'</td>'+
								'<td class="mftj">'+getrc(bb[i]['RecommendedTeam'])+'</td>'+
								'<td>'+bb[i]['GameScore']+'</td>'+
								'<td class="'+rescolor+'">'+bb[i]['GameResult']+'</td>'+
								'<td>'+
									'<span class="shidan cd-popup-trigger0" rel="../../Public/res/'+bb[i]['ResultImage']+'">实单</span>'+
								'</td>'+
							'</tr>'+
							'<tr> style="background-color:#D4F4FF;">'+
								'<td style="padding:10px 0;" colspan="9"><a href="../history.php?g=bb">历史记录</a></td>'+
							'</tr>'
						);
					}
				}else{
					if(i % 2 === 0){
						$('#lanqiu table tbody').append(
							'<tr>'+
								'<td style="padding:10px 0;">'+bb[i]['GameName']+' '+mo+'-'+d+' '+h+':'+mi+'</td>'+
								'<td>'+
									'<p>'+bb[i]['UpperTeam']+'</p>'+
									'<hr style="border:none;border-bottom:1px solid #DACA58">'+
									'<p>'+bb[i]['LowerTeam']+'</p>'+
								'</td>'+
								'<td>'+bb[i]['Handicap']+'</td>'+
								'<td class="mftj">'+getrc(bb[i]['RecommendedTeam'])+'</td>'+
								'<td>'+bb[i]['GameScore']+'</td>'+
								'<td class="'+rescolor+'">'+bb[i]['GameResult']+'</td>'+
								'<td>'+
									'<span class="shidan cd-popup-trigger0" rel="../../Public/res/'+bb[i]['ResultImage']+'">实单</span>'+
								'</td>'+
							'</tr>'
						);
					}else{
						$('#lanqiu table tbody').append(
							'<tr>'+
								'<td style="padding:10px 0;">'+bb[i]['GameName']+' '+mo+'-'+d+' '+h+':'+mi+'</td>'+
								'<td>'+
									'<p>'+bb[i]['UpperTeam']+'</p>'+
									'<hr style="border:none;border-bottom:1px solid #DACA58">'+
									'<p>'+bb[i]['LowerTeam']+'</p>'+
								'</td>'+
								'<td>'+bb[i]['Handicap']+'</td>'+
								'<td class="mftj">'+getrc(bb[i]['RecommendedTeam'])+'</td>'+
								'<td>'+bb[i]['GameScore']+'</td>'+
								'<td class="'+rescolor+'">'+bb[i]['GameResult']+'</td>'+
								'<td>'+
									'<span class="shidan cd-popup-trigger0" rel="../../Public/res/'+bb[i]['ResultImage']+'">实单</span>'+
								'</td>'+
							'</tr>'
						);
					}
				}
			}
		}
	});
</script>
<div id="myCarousel"></div>
	<div id="myCarousel" class="carousel slide">
		<div class="carousel-inner">
			<img src="./statics/default/images/mobile/carobg.png" alt="">
		</div>  
	</div>
<div style="margin-top: -30px;">
	<div class="bg">
		<img src="./statics/default/images/mobile/resbg.png" alt="" style="width:100%;">
		

		<p style="position:absolute;width:80%;left:10%;top:10px;color:#3F9DE2;font-weight:bold;">
		<span>给梦想一个机会 ，给未来一种可能</span>
		<span>博盈推荐，带您收入翻番</span>
		<span>重磅赛事，免费大公开</span>
		<span>更多精彩赛事请添加高手QQ、微信交流咨询！</span>
		
		</p>
		
		<div class="item" style="color:red; margin-top: 50px; margin-left: 50px;">
			<img alt="" class="imgclass clssv qqcode">
			<p>QQ：<span class="qqc"></span></p>
		</div>
		<div class="item" style="color:red; margin-top: 50px;">
			<img alt="微信二维码" class="imgclass clssv1 wccode">
			<p>微信号：<span class="wcc wc"></span></p>
		</div>
		
		
		<!-- <p style="position:absolute;width:80%;left:20%;top:45px;color:red;font-weight:bold;text-shadow:1px 1px 1px #fff;">
		<span>QQ：</span><span class="qqc"></span><span style="margin-left:20%;">微信号</span>：<span class="wcc wc"></span></p>
		<img alt="" class="imgclass clssv wmm">
		<img alt="微信二维码" class="imgclass clssv1 wmm"> -->
	</div>	
</div>
<div id="content">
	<div class="right">
		<div id="zuqiu">
			<!-- <div style="margin-top:10px;"><a target="_blank" href="http://www.ac9393.com"><img style="width:100%" src="./statics/default/images/xinzeng/100290.gif"></a> -->
				<div>
					<div class="title">
						<!--<span class="qq">
							<span style="margin-left:82px;">QQ:779846505</span>
							<span style="color:#6B5309;font-weight:bold;position:absolute;right:0;">★ 足球推荐 ★</span>
						</span>-->
						<img src="./statics/default/images/mobile/fbtitle.png" alt="足球推荐">
					</div>
					<table class="table" border="1" cellspacing="0">
						<thead>
							<tr>
								<th style="padding:4px 0;">开盘时间</th>
								<th>上/下盘球队</th>
								<th>盘口</th>
								<th style="width:80px;">免费推荐</th>
								<th>比分</th>
								<th>结果</th>
								<th style="width:48px;">实单</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
      		</div>
     	</div>
		<div id="lanqiu" style="padding-bottom:80px;">
			<!-- <div style="margin-top:10px;"><a target="_blank" href="http://www.ac9393.com"><img style="width:100%" src="./statics/default/images/xinzeng/100290.gif"></a> -->
			  	<div>
            		<div class="title">
						<!--<span class="qq">
							<span style="margin-left:82px;">QQ:779846505</span>
							<span style="color:#6B5309;font-weight:bold;position:absolute;right:0;">★ 篮球推荐 ★</span>
						</span>-->
						<img src="./statics/default/images/mobile/bbtitle.png" alt="篮球推荐">
					</div>
					<table class="table" border="1" cellpadding="0" cellspacing="0">
						<thead>
							<tr>
								<th style="padding:4px 0;">开盘时间</th>
								<th>上盘/下盘</th>
								<th>盘口</th>
								<th style="width:80px;">免费推荐</th>
								<th>比分</th>
								<th>结果</th>
								<th style="width:48px;">实单</th>
							</tr>
						</thead>
						<tbody>
						
						</tbody>
					</table>
				</div>
        	</div>
		</div>
  	</div>
    <style type="text/css">
		*{
			padding: 0;
			margin: 0;
		}
		.ui-content{
		    margin: 0px auto 0px auto;
		    padding: 80px 20px 40px 20px;
		    /*width: 1000px;*/
		    background: #FBF9AE url(./statics/default/images/content-tit2.png) no-repeat center top;
		    line-height: 2em;
		    border: 1px solid #B49C00;
		    font-size: 18px;
		    font-weight: bold;
		    overflow: hidden;
		    box-shadow: 0px 0px 30px rgba(0,0,0,0.8);
		    border-bottom-left-radius: 10px;
		    border-bottom-right-radius: 10px;
		    margin-bottom: 55px;
		}
      .ui-content p{
      	font-size:15px;
      }
		.ui-content img{
			width: 100%;
		}
		.ui-content h1 {
		    margin-top: 20px;
		    font-size: 20px;
		    color: #ce000c;
		}
		.ui-content h2 {
		    font-size: 18px;
		    color: #ce000c;
		}
		.zhuanjia {
		    margin-top: 20px;
		    text-align: center;
		    font-weight: bold;
		    font-size: 25px;
		    color: #7030a0;
		}
		a.red {
		    color: #ce000c;
		}
		.ui-content div {
		    margin-top: 30px;
		    color: #205cc9;
		    font-size: 16px;
		    font-weight: bold;
		}
	</style>
    <div id="pankou" class="ui-content" style="display:none;">
		<p style="text-align:center;"><img src="./statics/comment/images/pic-money2.jpg"></p>
		<h1>实力盘的一般看法：</h1>
		<p>
			　　1、区域划分：一般分为上游 1—4、中上游 4—9、中下游 9—15、下游 16—22 四类。 
			<br>　　2、若主队比客队排名靠后 4 名之内，可让半球。差 4—6 名之内，可让平/半。差 6—12 名可让平手。
			<br>　　3、若主队比客队排名靠前 4 名之内，可让半球。靠前 4—8 名之内，可让半/一。靠前 8—12 名，可让一球。 
			<br>　　4、当主队排名靠后，正常实力让球时，一般让中水、高水。当主队排名靠前，正常实力让球时，一般让低水、中水。
			<br>　　5、客场时，实力盘下降两等级， 以上就是赔率统计的正确分析方法。
		</p>
		<h2>　　1、给水型</h2>
		<p>　　在一球升上一球/球半后，持续降水，应是热的表现，然而有个从0.90水升到1.025水的情况，这就叫给水，给你好处、给你便宜让你占，因此上盘打不出，最后0：0互交白卷。</p>
		<h2>　　2、赶下型</h2>
		<p>　　水位不断的升高，降盘后还继续升高，赶下盘后，上盘顺利打出。 注意：一般这类赶下盘，水位不能出现长时间的震荡，要不就不符合这一类型的盘路。</p>
		<h2>　　3、诱上型</h2>
		<p>　　与赶下盘盘路相反。庄家一直在降上盘的水，升盘后给个更高的水位，再持续降水，因此诱上成功。</p>
		
		<h1>总体来说几个盘的处理方法都可以用很简单的语言概括如下：</h1>
		<p>
			　　1、平手盘。 
			<br>　　A、观察弱势一方是否强让平手，让盘的理由是什么，理由是否充分。 
			<br>　　B、观察弱势一方临场是否大热。 
			<br>　　C、观察强势一方是否近况很好，导致容易忽略弱势一方的理由。 
			<br>　　D、观察强势一方临场是否大热的前题下偏偏不升盘。    
			<br>　　2、平/半盘。
			<br>　　A、观察下盘有否战胜上盘的实力。
			<br>　　B、观察上盘是否强让平/半，以及让盘理由。
			<br>　　C、观察盘赔在临场的吻合度。
			<br>　　D、若下盘大热时，观察是否庄家在临场迅速变水赶下盘。
			<br>　　3、半球盘。
			<br>　　A、观察是否是实力盘。
			<br>　　B、若不是实力盘，是否上盘有题材，会不会造成上盘大热。
			<br>　　C、观察盘赔的吻合度，盘赔一定要保持吻合，上盘才有机会。
			<br>　　D、若下盘大热时，观察是否庄家在临场迅速变水赶下盘。
			<br>　　4、半/一盘。
			<br>　　A、观察是否是实力盘。 
			<br>　　B、若不是实力盘，是否下盘有题材，会不会造成上盘或下盘大热。
			<br>　　C、观察盘赔的吻合度，盘赔一般情况下要保持吻合，若盘赔不吻合，下盘一般有机会。
			<br>　　D、若下盘大热时，观察是否庄家在临场迅速变水赶下盘。
			<br>　　E、若上盘大热时，观察是否庄家一直维持上盘低水降低上盘赔付。
			<br>　　F、若上盘盘赔不吻合时，观察上盘是否有阻挡或者降低赔付的倾向。
			<br>　　初盘给半球是实力盘，升半/一就不对劲了，从盘赔来看，初盘就不看好客队，受注升盘还给客队高水，更加不看好，因此这个蛊惑盘借用了客队近来强势的特点，却故意引人忽略主队主场的强悍，从而打出下盘。
		</p>
		<p class="zhuanjia">亚盘分析专家<a class="red" href="tencent://AddContact/?fromId=50&amp;fromSubId=1&amp;subcmd=all&amp;uin=7023337">QQ：7023337</a> 【 初盘 】 【 临场盘 】 【绝对免费】</p>
		<p style="text-align:center;"><img src="./statics/comment/images/pic-money2.jpg"></p>
		<div>
			　　本人多年初盘临场盘累积经验，深刻透彻了解庄家开盘意图，现在赌球单凭你们自己是赌不赢庄家的，庄家开出的盘口往往都是你们下注的陷阱，现有心指导各位波友，勿再盲目送钱给庄家，没有一本万利和绝对的运气，只有全面的盘口分析和长期奋战才是保持胜率的关键。想翻身就加亚盘分析专家 <a class="red" href="tencent://AddContact/?fromId=50&amp;fromSubId=1&amp;subcmd=all&amp;uin=7023337">QQ：7023337</a> 百分百免费！
		</div>
	</div>
</div>

<div class="cd-popup">
    <div class="cd-popup-container">
        <p style="padding:10px 0;background-color:#02811A;font-size:18px;font-weight:bold;color:#fff;">实单分析</p>
        <div class="cd-buttons"></div>
        <a href="#0" class="cd-popup-close">close</a>
    </div>
</div>
<script>
	  
	$(function(){
      	$('.mftj').each(function(){
       		$(this).html($(this).text().replace(' ','<br/>')); 
        });
      	
      
		$('#jieshao').css({'background':'#1A609C'});
		$('#jieshao p strong').each(function(){
			if($(this).css('font-size')=='24px'){
				$(this).css('color','#F8FC00')
			}
		});
		$('#jieshao p strong span').css({'font-size':'12px','color':'#fff'});
		$('#jieshao img').css({'width':'100%','height':'auto'});
		
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
				event.preventDefault();
				$('.cd-buttons').empty();
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
<style type="text/css">
  #content{
  	margin-bottom:10px;
  }
  .footer-fix{
			width: 100%;
			height: 55px;
			background: #031926;
			position: fixed;
			display: flex;
			font-size: 0;
			z-index: 100;
			bottom: 0;
			align-items: center;
    		padding-bottom:20px;
		}
		.footer-fix a{
			flex: 0 0 33%;
			font-size: 11px;
			color: #fff;
			text-align: center;
			text-decoration: none;
		}
		.footer-fix a img{
			width: 25px;
			height: 22px;
          	margin-bottom:5px;
		}
		.footer-fix em{
			display: block;
		    line-height: 1.5em;
		    font-size: 22px;
		}

	</style>
	<div class="footer-fix">
      	<a href="#zuqiu" class="fix1">
			<em class="iconfont"><img src="./statics/default/images/mobile/wfbbtn.png"></em>
			<div>足球推荐</div>
		</a>
       <a href="#lanqiu" class="fix2">
	   		<em class="iconfont"><img src="./statics/default/images/mobile/wbbbtn.png"></em>
			<div>篮球推荐</div>
		</a>
		<!--a target="_blank" href="http://030933.com/" class="fix2">
			<em class="iconfont"><img src="/statics/default/images/sj-48.png"></em>
			<div>下载APP</div>
		</a-->
		<a href="#pankou" class="fix3">
			<em class="iconfont"><img src="./statics/default/images/mobile/winfobtn.png"></em>
			<div >盘口介绍</div>
		</a>
		<!--a target="_blank" href="https://www.ac9393.com/" class="fix4" target="_self">
			<em class="iconfont icon-shijiebei"></em>
			<div>皇冠外围投注</div> 
		</a-->
	</div>
	<script type="text/javascript">
		$(".footer-fix a").click(function(){
			$(this).find('em').css('color', '#83aa00');
			$(this).find("div").css('color', '#83aa00');
			$(this).siblings().find('em').css('color', '#fff');
			$(this).siblings().find("div").css('color', '#fff');
		})
      	$(".fix3").click(function(){
			$(this).find('img').attr('src','./statics/default/images/mobile/yinfobtn.png');
        	$(".ui-content").css("display","block");
			  $(".right").css("display","none");

			  $('.fix1').find('img').attr('src','./statics/default/images/mobile/wfbbtn.png');
			  $('.fix2').find('img').attr('src','./statics/default/images/mobile/wbbbtn.png');
        });
      	$(".fix1").click(function(){
			$(this).find('img').attr('src','./statics/default/images/mobile/yfbbtn.png');
        	$(".ui-content").css("display","none");
			$(".right").css("display","block");

			$('.fix3').find('img').attr('src','./statics/default/images/mobile/winfobtn.png');
			  $('.fix2').find('img').attr('src','./statics/default/images/mobile/wbbbtn.png');
			
        });
      $(".fix2").click(function(){
			$(this).find('img').attr('src','./statics/default/images/mobile/ybbbtn.png');
        	$(".ui-content").css("display","none");
			  $(".right").css("display","block");
			  
			  $('.fix3').find('img').attr('src','./statics/default/images/mobile/winfobtn.png');
			  $('.fix1').find('img').attr('src','./statics/default/images/mobile/wfbbtn.png');
        });
	</script>

<div style="display:none;">
  <script language="javascript" src="http://count4.51yes.com/click.aspx?id=41342228&amp;logo=1" charset="gb2312"></script>
</div>

<script>
	$(document).ready(function(){
		$.ajax({
			url: '/Ajax/Games/getVoucher',
			method: 'post',
			data: {},
			dataType: 'json',
			success: function(voucher){
				$('.qqc').text(voucher.qq[0]['VoucherCode']);
				$('.wcc').text(voucher.wc[0]['VoucherCode']);
			}
		});

		$.ajax({
			url: '/Ajax/Games/getQr',
			method: 'post',
			data: {},
			dataType: 'json',
			success: function(qr){
				$('.qqcode').attr('src','../../Public/qr/'+qr.qqc[0]['QrImage']);
				$('.wccode').attr('src','../../Public/qr/'+qr.wcc[0]['QrImage']);
			}
		});
	});
</script>
