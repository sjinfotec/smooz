<template>
  <div>
    <div id="cnt_title_search">
      <h3 class="print-none">見積検索</h3>
    </div>
    <div id="cnt1" >
      <div class="line">
        <div class="inputgroup">
          <button>見積編集</button>
        </div>
        <div class="inputgroup">
          <button style="pointer-events: none;" disabled>受注</button>
        </div>
        <div class="inputgroup">
          <button type="button" id="search_ovv_btn" @click="OverviewClick();">製品概要</button>
        </div>
        <div class="inputgroup">
          <button type="button" id="search_cnt_btn" @click="ContentsClick();">内容</button>
        </div>
        <div class="inputgroup">
          <button type="button" @click="clickEvent('','','','clear','クリア','','') ">クリア</button>
        </div>
      </div>
      <div class="line">
        <div class="inputgroup3">
          <label><span class="spanwidth_8">見積番号</span><input type="text" class="form_style input_w100p_m" v-model="s_m_code" name="s_m_code"></label>
        </div>
        <div class="inputgroup3">
          <label><span class="spanwidth_8">得意先コード</span><input type="text" class="form_style input_w100p_m" v-model="s_customer_code" name="s_customer_code"></label>
        </div>
        <div class="inputgroup3">
          <label><span class="spanwidth_8">得意先名<!--<span class="care">&#10045;</span>--></span><input type="text" class="form_style input_w100p_m" v-model="s_customer" name="s_customer"></label>
        </div>
      </div>
      <div class="line">
        <div class="inputgroup3">
          <label><span class="spanwidth_8">エンドユーザー</span><input type="text" class="form_style input_w100p_m" v-model="s_enduser" name="s_enduser"></label>
        </div>
        <div class="inputgroup3">
          <label><span class="spanwidth_8">製品名</span><input type="text" class="form_style input_w100p_m" v-model="s_product" name="s_product"></label>
        </div>
        <div class="inputgroup4">
          <label><span class="spanwidth_8">作成年月（期間）</span><span class="spanblock1"><input type="text" class="form_style input_search_w1" v-model="s_date_start" name="s_date_start">～<input type="text" class="form_style input_search_w1" v-model="s_date_end" name="s_date_end"></span></label>
        </div>
      </div>

      <div class="line">
        <div class="inputgroup">
          <span id="doc_mark" class="markzone mz_c2 v_hidden"></span>
          <button type="button" id="search_doc_btn" @click="SearchClick('doc',0,'見積書');">見積書を検索</button>
        </div>
        <div class="inputgroup">
          <span id="mit_mark" class="markzone mz_c2 v_hidden"></span>
          <button type="button" id="search_mit_btn" @click="SearchClick('mit',0,'見積');">見積を検索</button>
        </div>
        <!--
        <div class="inputgroup">
          <div class="caretxt">&#10045; 部分一致可</div>
        </div>
        -->
      </div>

      <div id="cnt_search">
        <form id="searchform">
        <h4>{{ sr_title }}<span id="search_com" class="v_hidden"></span></h4>
        <div class="actionmsg_array mgt10 print-none" v-if="actionmsgArr.length">
          <ul class="">
            <li v-for="(actionmsg,index) in actionmsgArr" v-bind:key="index">{{ actionmsg }}</li>
          </ul>
        </div>
        <div id="search_result" v-if="searchview === 'doc'">
          <table id="quodoc">
            <thead>
              <tr>
                <th class="w2"></th>
                <th class="nrap">見積書番号</th>
                <th class="">作成日</th>
                <th class="nrap">得意先コード</th>
                <th class="nrap">得意先名</th>
                <th class="">形態</th>
                <th class="w1">製品名</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(ditem,drowIndex) in 45" :key="drowIndex">
                <td class="w2">
                  <!--<input type="radio" name="wm_code" value="">-->
                  <button type="button" class="srbtn" @click="MitGoBtn(ditem['id'],ditem['m_code'])">
                    見積
                  </button>
                </td>
                <td class="nrap">22060123</td>
                <td class="nrap">2022年6月18日</td>h_com
                <td class="nrap">54321</td>
                <td class="nrap">JR北海道</td>
                <td class="nrap">通常</td>
                <td class="">線路施設工事線区別日報</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div id="search_result" v-if="searchview === 'mit'">
          <table id="quodoc">
            <thead>
              <tr>
                <th class="w2"></th>
                <th class="nrap">見積番号</th>
                <th class="">作成日</th>
                <th class="nrap">得意先コード</th>
                <th class="nrap">得意先名</th>
                <th class="w1">製品名</th>
                <th class="">制作数</th>
                <th class="">金額</th>
                <th class="">受注日</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(mitem,mrowIndex) in details" :key="mrowIndex">
                <td class="w2"><label style="display:block;"><input type="radio" name="m_codes" :id="'sr_' + mrowIndex" v-model="mcradio" :value="mrowIndex"></label></td>
                <td class="nrap">{{ mitem['m_code'] }}</td>
                <td class="nrap">{{ mitem['f_create_date'] }}</td>
                <td class="nrap">{{ mitem['customer_code'] }}</td>
                <td class="nrap"><label :for="'sr_' + mrowIndex" style="display:block;">{{ mitem['customer'] }}</label></td>
                <td class=""><label :for="'sr_' + mrowIndex" style="display:block;">{{ mitem['product'] }}</label></td>
                <td class="nrap ta_r">{{ mitem['f_production_volnum'] }} {{ select_arr_s002[mitem['production_volnum_unit']-1]['code_name'] }} {{ pvu[mrowIndex]['production_volnum_unit'] }}</td>
                <td class="nrap ta_r">{{ mitem['f_estimate_amount'] }} 円</td>
                <td class="nrap">{{ mitem['f_lastorder_date'] }}</td>
              </tr>
            </tbody>
          </table>
        </div>
        </form>
      </div>

    </div><!--end id cnt1-->


    <div id="printzone" v-if="printview === '1'">
      <popup-print
       v-bind:m-code="m_code"
       v-bind:print-data="printdata"
       v-bind:print-title="printtitle"
       v-on:pricancel-event="Pricancel"
      ></popup-print>
      <div id="php_view">ファイル読み込み中...</div>
    </div>

    <div id="printgaiyo"></div>




    <div id="print2zone" v-if="printview === '2'">

			<div id="print2_title">
				<h1>三条印刷　製品便覧</h1>
				<div class="abs_r">L06541</div>
			</div>



			<div id="print2_main">
				<div id="p2_cnt">
					<dl>
						<dt class="em5">得意先</dt>
						<dd>変数欄</dd>
					</dl>
					<dl>
						<dt class="em5">需要家</dt>
						<dd>変数欄</dd>
					</dl>
					<dl>
						<dt class="em5">製品名</dt>
						<dd>変数欄</dd>
					</dl>
				</div>

				<div id="p2_cnt_flex" class="mgt20">
						<dl>
							<dt class="em5">サイズ</dt>
							<dd>変数欄</dd>
						</dl>
						<dl>
							<dt class="em3">姿</dt>
							<dd>変数欄</dd>
						</dl>
						<dl>
							<dt class="em4">印刷</dt>
							<dd>変数欄</dd>
						</dl>
				</div>

				<div id="p2_cnt_flex2" class="mgt20">
					<div class="waku">
						<dl>
							<dt class="em3">数量</dt>
							<dd>変数欄</dd>
						</dl>
						<dl>
							<dt class="em4">総数量</dt>
							<dd>変数欄</dd>
						</dl>
					</div>
					<div class="waku">
						<dl>
							<dt class="em6">シリンダー</dt>
							<dd>変数欄</dd>
						</dl>
					</div>
				</div>

        <!--✽  &#10045;-->
				<div id="p2_tbl" class="mgt20">
					<table>
						<thead>
							<tr>
								<th class="w2">P</th>
								<th class="nrap">用紙・紙質</th>
								<th colspan="6" class="">オプション</th>
								<th colspan="9" class="">フォーム</th>
								<th colspan="2" class="">ＯＦ</th>
								<th colspan="9" class="">活版</th>
								<th colspan="6" class="">ダイカッタ</th>
							</tr>
							<tr>
								<th class=""></th>
								<th class=""></th>

								<th class="w1">減感</th>
								<th class="w1">カボン</th>
								<th class="w1">ホワイ</th>
								<th class="w1">セパレ</th>
								<th class="w1">表色数</th>
								<th class="w1">裏色数</th>

								<th class="w1">ミシン</th>
								<th class="w1">Ｊミン</th>
								<th class="w1">Ｍミン</th>
								<th class="w1">ＪＭミ</th>
								<th class="w1">スジ入</th>
								<th class="w1">スリト</th>
								<th class="w1">ナンバ</th>
								<th class="w1">コーナ</th>
								<th class="w1">ＩＪＰ</th>

								<th class="w1">ミシン</th>
								<th class="w1">ナンバ</th>

								<th class="w1">ミシン</th>
								<th class="w1">Ｊミン</th>
								<th class="w1">Ｍミン</th>
								<th class="w1">ＪＭミ</th>
								<th class="w1">スジ入</th>
								<th class="w1">スリト</th>
								<th class="w1">型抜き</th>
								<th class="w1">親子№</th>
								<th class="w1">ナンバ</th>

								<th class="w1">ミシン</th>
								<th class="w1">Ｊミン</th>
								<th class="w1">Ｍミン</th>
								<th class="w1">ＪＭミ</th>
								<th class="w1">穴ヶ所</th>
								<th class="w1">コーナ</th>
							</tr>
						</thead>
						<tbody>
							<tr v-for="(gitem,growIndex) in 15" :key="growIndex">
								<td class="">{{growIndex + 1}}</td>
								<td class="txtstyle">用紙名が入る</td>

								<td class="">*</td>
								<td class=""></td>
								<td class=""></td>
								<td class="">*</td>
								<td class="">4</td>
								<td class="">1</td>

								<td class=""></td>
								<td class=""></td>
								<td class=""></td>
								<td class=""></td>
								<td class=""></td>
								<td class=""></td>
								<td class=""></td>
								<td class=""></td>
								<td class=""></td>

								<td class=""></td>
								<td class=""></td>

								<td class=""></td>
								<td class=""></td>
								<td class=""></td>
								<td class=""></td>
								<td class=""></td>
								<td class=""></td>
								<td class=""></td>
								<td class=""></td>
								<td class=""></td>

								<td class=""></td>
								<td class=""></td>
								<td class=""></td>
								<td class=""></td>
								<td class=""></td>
								<td class=""></td>
							</tr>
						</tbody>
					</table>
				</div>


				<div id="p2_cnt2" class="mgt20">
					<dl>
						<dt class="width_style">組版</dt>
						<dd>変数欄</dd>
					</dl>
					<dl>
						<dt class="width_style">フォーム部</dt>
						<dd>変数欄</dd>
					</dl>
					<dl>
						<dt class="width_style">オフセット部</dt>
						<dd>変数欄</dd>
					</dl>
					<dl>
						<dt class="width_style">情報処理</dt>
						<dd>変数欄</dd>
					</dl>
					<dl>
						<dt class="width_style">コレート</dt>
						<dd>変数欄</dd>
					</dl>
					<dl>
						<dt class="width_style">ネームライナ</dt>
						<dd>変数欄</dd>
					</dl>
					<dl>
						<dt class="width_style">製本</dt>
						<dd>変数欄</dd>
					</dl>
				</div>


				<div id="p2_cnt3">
					<dl>
						<dt>最終受注日</dt>
						<dd>年月日</dd>
					</dl>
				</div>
			</div>

			<div id="print_btnzone" class="print-none">
				<button type='button' onclick='window.print(); return false;'>印刷</button>
				<button type='button' @click="Pricancel();">閉じる</button>
			</div>
    </div>


  </div>
</template>
<script>

// import mit-parts from "./Parts.vue";
//import moment from "moment";
import { dialogable } from "../mixins/dialogable.js";
import { checkable } from "../mixins/checkable.js";
import { requestable } from "../mixins/requestable.js";

export default {
  name: "QuotationsSearch",
  mixins: [dialogable, checkable, requestable],
  //mixins: [requestable],
  props: {
  /*
    authusers: {
      type: Array,
      default: []
    }
  pvu: {
    default: details[]['production_volnum_unit']
  }
  */
  },
  data() {
    return {
      details: [],
      login_user_code: 0,
      login_user_role: 0,
      dialogVisible: false,
      messageshowsearch: false,

      s_m_code: "",
      s_customer_code: "",
      s_customer: "",
      s_enduser: "",
      s_product: "",
      s_date_start: "",
      s_date_end: "",

      searchview: "",
      printview: "",
      sr_title: "",
      mcradio: "",
      printdata: "",
      m_code: "",
      printtitle: "",
      searchdetail: "",



      pvu: [],

      event_title: "",
      actionmsgArr: [],
      select_arr_s001: [],
      select_arr_s002: [],
      select_arr_s003: [],
      select_arr_s004: [],
      select_arr_s005: [],

    };
  },
  // マウント時
  mounted() {
    //this.login_user_code = this.authusers["code"];
    //this.login_user_role = this.authusers["role"];
  },
  methods: {
    // -------------------- イベント処理 --------------------

    clickEvent(fname,val1,val2,cf,com1,md,smd) {
      var fm = document.getElementById(fname);
      //var tname = document.getElementsByName(val1);
      //Submit値を操作
      //fm.edit_id.value = val;
      //fm.tname.value = val;
      //tname[0].value = val;	//[0]を付けないとundefind

      //alert('clickEvent 引数 = ' + fname + ' 、 ' + tn + ' 、 ' + val + ' 、 ' + cf);

        if(cf == 'clear') {
          //var Jname = fm.name.value;
          //var Js_product_code = fm.s_product_code.value;
          //var result = window.confirm( com1 +'\\n\\n店舗名 : '+ Jname +'\\nコード : '+ Jname_code +'');
          //var result = window.confirm(Jproduct_id + ' ' + com1 + 'します');
          this.s_m_code = "";
          this.s_customer_code = "";
          this.s_customer = "";
          this.s_enduser = "";
          this.s_product = "";
          this.s_date_start = "";
          this.s_date_end = "";
          this.actionmsgArr = [];
          this.details = [];

          console.log('クリアしました');
        }
        else if(cf == 'confirm_work_update') {
          var Jperformance = document.getElementById('performance_' + val1).value;
          //var Jstatus = fm.status.value;
          //var result = window.confirm( com1 +'\n伝票番号 : '+ Jproduct_code +'');
          var result = window.confirm( com1 +'\n'+ Jperformance +'');
          if( result ) {
            //fm.s_id.value = val1;
            //fm.s_performance.value = Jperformance;
            //fm.action = '/w';
            //fm.submit();
            this.ListUpdate(val1);
          }
          else {
            console.log('キャンセルがクリックされました');
          }

        }
        else if(cf == 'confirm_update') {
          var Jwork_name = fm.work_name.value;
          var Jdepartments_name = fm.departments_name.value;
          //var Js_product_code = fm.s_product_code.value;
          //var result = window.confirm( com1 +'\\n\\n店舗名 : '+ Jname +'\\nコード : '+ Jname_code +'');
          var result = window.confirm('部署名 : ' + Jdepartments_name + '\n工程 : ' + Jwork_name + '\n' + com1 + 'します');
          if( result ) {
            //fm.mode.value = md;
            fm.motion.value = 'reload';
            fm.action = '/process/insert';
            fm.submit();
          }
          else {
            console.log('キャンセルがクリックされました');
          }
        }
        else if(cf == 'select_del') {
          //var Jwork_name = fm.work_name.value;
          //var Jdepartments_name = fm.departments_name.value;
          //var Js_product_code = fm.s_product_code.value;
          //value="DEL" id="work_code_del"
          //var result = window.confirm( com1 +'\\n\\n店舗名 : '+ Jname +'\\nコード : '+ Jname_code +'');
          var result = window.confirm('部署名 : ' + val1 + '\n' + com1 + 'します');
          if( result ) {
            //fm.work_code.value = 'DEL';
            fm.mode.value = md;
            fm.action = '/process/insert';
            fm.submit();
          }
          else {
            console.log('キャンセルがクリックされました');
          }


        }
        else {
          //fm.submit();
        }
    },



    // 検索処理
    SearchClick(k,arr,str) {
      let idname_array = new Object(); 
      idname_array[0] = ['doc', 'mit'];


      for (let i = 0 ; i < idname_array[arr].length ; i++){

        var n = idname_array[arr][i];
        //const tid = "search_" + n + "_btn";
        const tid = n + '_mark';
        const sc = 'search_com';
        var targetid = document.getElementById(tid);
        var searchcom = document.getElementById(sc);

        if ( idname_array[arr][i] == k ) {
          targetid.style.visibility = "visible";
          searchcom.style.visibility = "visible";
          searchcom.innerHTML = str;

        }
        else {
          targetid.style.visibility = "hidden";
          
        } 
      }

      var motion_msg = "検索";
      var arrayParams = { 
        kind : k,
        s_m_code : this.s_m_code , 
        s_customer_code : this.s_customer_code , 
        s_customer : this.s_customer , 
        s_enduser : this.s_enduser , 
        s_product : this.s_product , 
        s_date_start : this.s_date_start , 
        s_date_end : this.s_date_end , 

      };
      this.postRequest("/qsearch/get", arrayParams)
        .then(response  => {
          this.putThenSearch(response, motion_msg);
        })
        .catch(reason => {
          this.serverCatch("取得");
        });

      this.sr_title = "検索結果";
      this.searchview = k;
      console.log('SearchClick  = ' + k);

    },
    MitGoBtn(i,mcode) {


    },
    ContentsClick() {
      const element = document.getElementById( "searchform" ) ;
      var radioNodeList = element.m_codes ;
      //console.log( 'radioNodeList = ' + radioNodeList ) ;

      //if (typeof a === "undefined") {
      if (radioNodeList == null) {
        alert('見積の検索をして下さい。');
      }
      else {
        var vvmc = radioNodeList.value ;
        if ( vvmc === "" ) {
          alert('検索結果一覧より見積を選択して下さい。');
          
        } else {
          
          this.printtitle = "見積内容 ― 製品名 ―";
          this.printdata = "【見積番号】" + this.details[vvmc]['m_code'] + "【作成日】" + this.details[vvmc]['create_date'] + " 【担当者】011 萬谷朋子 【OPRT】萬谷 【素見積】D15520\n";    
          this.printdata += "【得意先】 119  萬  谷（一 般）\n";
          this.printdata += "【エンドユーザー】 すずらん商事\n";
          this.printdata += "【製品名】 納品書（タイトルなし）\n";
          this.printdata += "【数量】1Ｐ 100,000枚 【総数量】100,000 【総通し数】50,000\n";
          this.printdata += "【規格】ミリ 【シリンダー】10.5インチ 3本 10.5インチ折\n";

          this.printdata += "<hr>";

          this.printdata += "【シリンダー】3 X 5000 = 15,000\n";
          this.printdata += "【フォーム部】\n";
          this.printdata += "【フォーム部合計】11,500 \n";
          this.printdata += "【版下設定】範疇：新版, 種別：フォーム, 難度：Ａ, 面積:72インチ平方, 料金:3000 \n";
          this.printdata += "       ＣＴＰ 3版 \n";
          this.printdata += "【組版・製版合計】12,000 \n";
          this.printdata += "【製　本】\n";
          this.printdata += "      [断裁・イン] [バースター] \n";
          this.printdata += "      [バラ] \n";
          this.printdata += "【梱包等】 [Ａ式] 2,500入り  40箱 X @250 = 10,000, \n";
          this.printdata += "【製本合計】66,000 \n";
          this.printdata += "【発　送】市内 40個 X 150 = 6,000, 【送料合計】 6,000 \n";

          this.printdata += "<hr>";

          this.printdata += "【用紙代総額】146,926【工賃～送料総額】170,500【実質原価総額】317,426 単価 3.17-\n";
          this.printdata += "【提示額】245,000 単価 2.45-\n";

          this.printdata += "vvmc -> " + vvmc;


          this.m_code = "D11999";
          const nopri = 'cnt1';
          var nopriid = document.getElementById(nopri);
          //nopriid.style.visibility = "visible";
          nopriid.style.display = "none";
          this.printview = '1';
          //console.log( vvmc ) ;


          let xhr = new XMLHttpRequest();
          xhr.open('POST', `openview.php`, true);
          xhr.addEventListener('load', function () {
            //console.log(this.response);
            //window.open(this.response);
            var phpview = document.getElementById("php_view") ;
            phpview.innerHTML = "" + this.response;
          });

          //var details_arr = JSON.parse(this.details);
          var details_arr = JSON.stringify(this.details[vvmc]);
          //var details_arr = this.details[vvmc].m_code;
          console.log('details_arr:' + details_arr);
          //var elA = JSON.parse(details_arr);

          let post_data = new FormData();
          post_data.append('details_arr', details_arr);
          post_data.append('m_code', this.details[vvmc]['m_code']);
          post_data.append('create_date', this.details[vvmc]['create_date']);
          /*
          this.details.forEach(function(elements, index, array){
            //var elJ = JSON.stringify(elements);
            //var elA = JSON.parse(elJ);

            post_data.append('details[' + index + ']', elements.m_code);
            console.log('D-Index:' + index);
            console.log('D-Element:' + elements.m_code);
            //console.log('Array:' + array);
          });
          */
          this.select_arr_s001.forEach(function(element, index, array){
            post_data.append('select_arr_s001[' + (index + 1) + ']', element['code_name']);
            //console.log('s001 Index:' + index);
            //console.log('s001 Element:' + element['code_name']);
          });
          this.select_arr_s002.forEach(function(element, index, array){
            post_data.append('select_arr_s002[' + (index + 1) + ']', element['code_name']);

            //console.log('s002 Index:' + index);
            //console.log('s002 Element:' + element['code_name']);
            //console.log('Array:' + array);
          });
          this.select_arr_s003.forEach(function(element, index, array){
            post_data.append('select_arr_s003[' + (index + 1) + ']', element['code_name']);
          });
          this.select_arr_s004.forEach(function(element, index, array){
            post_data.append('select_arr_s004[' + (index + 1) + ']', element['code_name']);
          });
          this.select_arr_s005.forEach(function(element, index, array){
            post_data.append('select_arr_s005[' + (index + 1) + ']', element['code_name']);
          });
          xhr.send(post_data);
          //xhr.send();


        }
      }
    },


    OverviewClick() {
      const element = document.getElementById( "searchform" ) ;
      var radioNodeList = element.m_codes ;
      //console.log( 'radioNodeList = ' + radioNodeList ) ;
      //if (typeof a === "undefined") {
      if (radioNodeList == null) {
        alert('見積の検索をして下さい。');
      }
      else {
        var vvmc = radioNodeList.value ;
        if ( vvmc === "" ) {
          // 未選択状態
          alert('検索結果一覧より見積を選択して下さい。');
        } else {


          /*
          $.ajax({
            url : 'm_101.php',
            type: 'post',
            dataType : 'html',
            data : { "vvmc": vvmc, "name": "アイランドラビリンス", },
            success : function(resultdata){
                $('#printgaiyo').html(resultdata);
                //ajaxJs();
            },
            error: function(data){
                $('#printgaiyo').html(data);
            }
          });
          */

          const nopri = 'cnt1';
          var nopriid = document.getElementById(nopri);
          nopriid.style.display = "none";
          this.printview = '2';
          //printgaiyo.style.display = "block";



          /*
          // 基本的にはresponse.dataにデータが返る
          function UPDATEcollect() {
            var tn = document.getElementById('t_number').value;
            var name = document.getElementById('name').value;
            var namecode = document.getElementById('name_code').value;
            console.log("t_number cn :" + tn);
            const res = axios.post("input_update.php", {
              t_number: tn,
              name: name,
              name_code: namecode,
              mode: 'statusupdate',
            })
            .then(response => {
              appendList(response.data);
              
            })
            .catch(error => {
              window.error(error.response.data);
            });
          }
          */





          const Str = "変数テスト";

          this.searchdetail = `
          <!DOCTYPE html>
          <html lang="ja">
          <head>
          <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
          <meta http-equiv="Content-Language" content="ja" />
          <title>TEST!</title>
          <meta name="viewport" content="width=device-width,initial-scale=1.0" />
          <meta http-equiv="Content-Style-Type" content="text/css" />
          <meta http-equiv="Content-Script-Type" content="text/javascript" />
          <link rel="stylesheet" type="text/css" href="./css/site.css" media="screen,print" />
          </head>
          <body>

          <button id='popup_printbtn' type='button' onclick='window.print(); return false;'>印刷</button>
          <div id="print_cnt_title">
            <h1>三条印刷　製品便覧</h1>
            <div class="abs_r">L06541</div>
          </div>

          <div id="print_cnt_main">
            <div>得意先</div>


          </div>
                    <h3>文字列</h3>
                    <div>
                      ヒアドキュメント<br>
                      テスト出力<br>
                      ${Str}<br>
                    </div>
          ${vvmc}

          </body>
          </html>
          `;

          //var myWindow = window.open("", "myWindow", "width=900, height=600, top=0, left=0");
          //myWindow.document.write(this.searchdetail);
          //myWindow.document.write("<div id='popup_cnt'><div>見積内容！</div><button id='popup_printbtn' type='button' onclick='window.print(); return false;'>印刷</button></div>" + vvmc);
          //console.log( vvmc ) ;


        }
      }
    },
    Pricancel() {
      const tid = "cnt1";
      var targetid = document.getElementById(tid);
      //targetid.style.visibility = "visible";
      targetid.style.display = "block";
      this.printview = false;

      console.log('プリント画面 終了');

    },



    // -------------------- サーバー処理 --------------------
    // -------------------- 共通 --------------------
    // 取得正常処理
    getThen(response) {
      console.log('正常');
    },
    // 検索系正常処理
    putThenSearch(response, eventtext) {
      var messages = [];
      var res = response.data;
      if (res.details.length > 0) {
          this.details = res.details;
          //this.classObj1 = (this.details[0].status == 'newest') ? 'bgcolor3' : '';
          //console.log("putThenSearch in res.search_totals = " + res.search_totals[0].total_s);
          //if (res.search_totals) {
          //  this.search_totals = res.search_totals[0].total_s;
          //}
          this.select_arr_s001 = res.select_arr_s001;
          this.select_arr_s002 = res.select_arr_s002;
          this.select_arr_s003 = res.select_arr_s003;
          this.select_arr_s004 = res.select_arr_s004;
          this.select_arr_s005 = res.select_arr_s005;
          this.pvu = res.pvu;
          //console.log("putThenSearch in res.production_volnum_unit = " + res.pvu);

          var date_se = '';
          if(res.s_date_start && res.s_date_end) {
            date_se = res.s_date_start + '～' + res.s_date_end;
          }
          else if(res.s_date_start){
            date_se = res.s_date_start + '～';
          }
          else if(res.s_date_end) {
            date_se = '～' + res.s_date_end;
          }

          this.event_title = res.s_m_code + ' ' + res.s_customer_code + ' ' + res.s_customer + ' ' + res.s_enduser + ' ' + res.s_product + ' ' + date_se;
          //console.log("putThenSearch in res.s_customer = " + res.s_customer);
          this.$toasted.show(this.event_title + " " + eventtext + "しました");
          this.actionmsgArr.push(this.event_title + " を検索しました。" , " 検索数 : " + res.details.length + " 件");
      } else {
          this.actionmsgArr.push(this.s_m_code + this.s_customer_code + this.s_customer + this.s_enduser + this.s_product + this.s_date_start + this.s_date_end + " が見つかりませんでした。");
          this.details = [];
        if (res.messagedata.length > 0) {
          this.htmlMessageSwal("警告", res.messagedata, "warning", true, false);
        } else {
          this.serverCatch(eventtext);
        }
      }
    },

    // 異常処理
    serverCatch(eventtext) {
      console.log('異常処理 -> ' + eventtext);
    },
  }
};
</script>
