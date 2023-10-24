<template>
  <div>
    <div class="mainframe bc1 gc3">
      <div id="cnt_title_search">
        <h3 class="print-none">ファインダー 【一覧検索】</h3>
      </div>

      <div class="nowloading" v-if="loading">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="48" height="48">
          <circle cx="12" cy="12" r="10" fill="none" stroke="#548017"
                  stroke-width="2" stroke-dasharray="63" stroke-linecap="round">
              <animate attributeName="stroke-dashoffset" values="63;16;63" keyTimes="0;.5;1"
                      keySplines=".42 0 .58 1;.42 0 .58 1;" calcMode="spline"
                      dur="1.4s" repeatCount="indefinite"/>
              <animateTransform attributeName="transform" type="rotate" values="0,12,12;135,12,12;450,12,12"
                                keySplines=".42 0 .58 1;.42 0 .58 1;" calcMode="spline"
                                dur="1.4s" repeatCount="indefinite"/>
              <animateTransform attributeName="transform" type="rotate" from="0,12,12" to="270,12,12"
                                calcMode="linear" dur="1.4s" repeatCount="indefinite" additive="sum"/>
          </circle>
        </svg>
        
      </div>
      <div id="cnt4" class="mgt10">
        <div class="resultfindzone flex_flex_1 zindex3 gc3">
          <h3 class="gc2">担当</h3>
          <ul>
            <li v-for="(dmgr,index) in details_manager" v-bind:key="index" class="setitem"><a href="#" class="setitem_a" @click.prevent="clickEvent('',index,dmgr['manager'].trim(),'setmgr','選択','','') ">{{ dmgr['manager'].trim() }}</a></li>
          </ul>
        </div>
        <div v-bind:class="{'activeview': details_customer.length}" class="resultfindzone flex_flex_2 hiddenview transition2 zindex2 gc3">
          <h3 class="gc2">得意先</h3>
          <ul>
            <li v-for="(dcust,index) in details_customer" v-bind:key="index" class="itemcust"><a href="#" class="itemcust_a" @click.prevent="clickEvent('',index,dcust['customer'].trim(),'setcust','選択','','') "><span class="ccode">{{ dcust['customer_code'] }}</span><span class="customerline">{{ dcust['customer'].trim() }}</span></a></li>
          </ul>
        </div>
        <div v-bind:class="{'activeview': details_enduser.length}" class="resultfindzone flex_flex_2 hiddenview transition2 zindex1 gc3">
          <h3 class="gc2">エンドユーザー</h3>
          <ul>
            <li v-for="(dend,index) in details_enduser" v-bind:key="index" class="itemend"><a href="#" class="itemend_a" @click.prevent="clickEvent('',index,dend['enduser'].trim(),'setend','選択','',s_customer) ">{{ dend['enduser'].trim() }}</a></li>
            <!--<li>{{s_customer}}</li>-->
          </ul>
        </div>
        <div v-bind:class="{'activeview': details_product.length}" class="resultfindzone flex_flex_2 hiddenview transition2 zindex0">
          <h3 class="gc2">製品名</h3>
          <ul>
            <li v-for="(dprod,index) in details_product" v-bind:key="index" class="itemprod"><a href="#" class="itemprod_a" @click.prevent="clickEvent('',index,dprod['id'],'setprod','選択','','') ">{{ dprod['m_code'] }} {{ dprod['product'].trim() }}</a></li>
          </ul>
        </div>
      </div><!--end id cnt4-->
      <div id="cnt4" class="mgt10">
        <div v-bind:class="{'activeview': details.length}" class="resultfindzone flex_flex_1 hiddenview2 transition2 zindex0">
          <h3 class="gc2">製品詳細</h3>
          <div v-for="(item,index) in details" v-bind:key="item.id">
            <div class="line">
              <div class="inputgroup">
                <label><span class="spanwidth_8">見積番号</span><input type="text" class="form_style" v-model="details[index].m_code" name="m_code" readonly><span></span></label>
              </div>
              <div class="inputgroup">
                <label><span class="spanwidth_8">作成日</span><input type="text" class="form_style" v-model="details[index].create_date" name="create_date" readonly><span></span></label>
              </div>
            </div>
            <div class="line">
              <div class="inputgroup">
                <label><span class="spanwidth_8">担当者</span><input type="text" class="form_style" v-model="details[index].manager" name="manager" readonly><span></span></label>
              </div>
            </div>
            <div class="line">
              <div class="inputgroup">
                <label><span class="spanwidth_8">得意先</span><input type="text" class="form_style" v-model="details[index].customer_code" name="customer_code" readonly><input type="text" class="form_style" v-model="details[index].customer" name="customer" readonly></label>
              </div>
            </div>
            <div class="line">
              <div class="inputgroup">
                <label><span class="spanwidth_8">エンドユーザー</span><input type="text" class="form_style input_w30" v-model="details[index].enduser" name="enduser" readonly></label>
              </div>
            </div>
            <div class="line">
              <div class="inputgroup">
                <label><span class="spanwidth_8">製品名</span><input type="text" class="form_style input_w30" v-model="details[index].product" name="product" readonly></label>
              </div>
            </div>
            <div class="line">
              <div class="inputgroup">
                <label><input type="text" class="form_style input_w2" v-model="details[index].parts_num" name="parts_num">P</label>
              </div>
              <div class="inputgroup">
                <label>制作組数<input type="text" class="form_style input_w5" v-model="details[index].production_setnum" name="production_setnum">
                <select name="production_setnum_unit" v-model="details[index].production_setnum_unit" class="form_style">
                <option value=""></option>
                <option v-for="(s001,indexs001) in select_arr_s001" v-bind:value="s001.code" >{{ s001.code_name }}</option>
                </select>
                </label>
              </div>
              <div class="inputgroup">
                <label>制作冊数<input type="text" class="form_style input_w5" v-model="details[index].production_volnum" name="production_volnum">
                <select name="production_volnum_unit" v-model="details[index].production_volnum_unit" class="form_style">
                <option value=""></option>
                <option v-for="(s002,indexs002) in select_arr_s002" v-bind:value="s002.code" >{{ s002.code_name }}</option>
                </select>
                </label>
              </div>
              <div class="inputgroup">
                <span id="printing_mark" class="markzone mz_c1"></span>
                <button type="button" id="printing_btn" class="btn_style1" @click="OnButtonClickT('printing');">印刷有り</button>
                <input type="text" class="input_w1" value="1" v-model="details[index].printing"  name="printing" id="printing">
              </div>
            </div>
            <div class="line">
              <div class="inputgroup">
                <span id="inch_mark" class="markzone mz_c1 v_hidden"></span>
                <button type="button" id="inch_btn" class="btn_style1" @click="OnButtonClick03('inch',0,'unit');">インチ</button>
              </div>
              <div class="inputgroup">
                <span id="milli_mark" class="markzone mz_c1 v_hidden"></span>
                <button type="button" id="milli_btn" class="btn_style1" @click="OnButtonClick03('milli',0,'unit');">ミリ</button>
                <input type="text" class="input_w1" value="0" v-model="details[index].unit" name="unit" id="unit">

              </div>

              <div class="inputgroup flex flex_ai_c">
                  <label v-for="(s003,indexs003) in select_arr_s003" v-bind:for="'unit' + indexs003">
                    <input type="radio" v-bind:id="'unit' + indexs003" name="unit" v-bind:value="s003.code" v-model="details[index].unit" disabled />
                    {{ s003.code_name }}
                  </label>
              </div>

              <div class="inputgroup">
                <label>紙取<input type="text" class="form_style input_w2" v-model="details[index].papertray" name="papertray">切</label>
              </div>
              <div class="inputgroup">
                面付け...
                <label>横<input type="text" class="form_style input_w2" v-model="details[index].imposition_w" name="imposition_w"></label>
                ×
                <label>縦<input type="text" class="form_style input_w2" v-model="details[index].imposition_h" name="imposition_h"></label>
              </div>
            </div>
            <div class="line">
              <div class="inputgroup">
                <label>シリンダー
                <select name="cylinder" class="form_style" v-model.trim="details[index].cylinder">
                <option value=""></option>
                <option v-for="(s004,indexs004) in select_arr_s004" v-bind:value="s004.code" :key="s004.code">{{ s004.code_name }}</option>
                </select>
                </label>
                <label><input type="text" class="form_style input_w2" v-model="details[index].cylinder_num" name="cylinder_num">本</label>
              </div>
              <div class="inputgroup">
                サイズ...
                <label>横<input type="text" class="form_style input_w3" v-model="details[index].size_w" name="size_w"></label>
                ×
                <label>縦<input type="text" class="form_style input_w3" v-model="details[index].size_h" name="size_h"></label>
                <input type="text" class="form_style input_w2" v-model="details[index].size_top" name="size_top">/<input type="text" class="form_style input_w2" v-model="details[index].size_bottom" name="size_bottom">
                <label>
                <select name="inch_fold" class="form_style" v-model.trim="details[index].inch_fold">
                <option value=""></option>
                <option v-for="(s005,indexs005) in select_arr_s005" v-bind:value="s005.code" :key="s005.code">{{ s005.code_name }}</option>
                </select>
                インチ折
                </label>
                
              </div>
            </div>


            <!--<div>{{all_dpc_arr}}</div>-->
            <div class="line">
              <div class="inputgroup" v-for="(p001,indexp001) in container_arr_p001" :key="p001.id">
                <span :id="'parts' + container_arr_p001[indexp001].code + '_mark'" class="markzone2 mz_tc1 v_hidden" :style="{visibility:  [ container_arr_p001[indexp001].code == all_dpc_arr[indexp001] ? 'visible' : 'hidden']}"></span>{{all_dpc_arr[indexp001]}}
                <a href="#" :id="'parts' + container_arr_p001[indexp001].code + '_btn'" @click="SetParts(p001.code, p001.code_name);">{{ container_arr_p001[indexp001].code_name }}</a>
              </div>
            </div>


            <div id="department01" class="mgt40">
              <div class="inputgroup">
                <label><span class="spanwidth_1">コメント</span>&emsp;<span id="strLen">0文字</span>
                <textarea name="comment" class="form_style_textarea" v-model="details[index].comment" rows="4" id="textarea1" @keyup="viewStrLen();"></textarea>
                </label>
              </div>
            </div><!--end department01-->
          </div><!--end v-for-->




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
            <div class="inputgroup mgl_auto">
              <button type="button" @click="clickEvent('','','','clear','クリア','','') ">クリア</button>
            </div>
          </div>






        </div>





      </div><!--end id cnt4-->





      <div id="cnt1" >


        <div class="line mgt20" v-if="searchview === 'mit'">
          <div class="inputgroup">
            <button type="button" id="search_quo_btn" @click="QuoClick();">見積編集</button>
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
        </div>

          <div class="actionmsg_array mgt10 print-none" v-if="actionmsgArr.length">
            <ul class="">
              <li v-for="(actionmsg,index) in actionmsgArr" v-bind:key="index">{{ actionmsg }}</li>
            </ul>
          </div>

        <div id="cnt_search">
          <form id="searchform">
          <h4>{{ sr_title }}<span id="search_com" class="v_hidden"></span></h4>
          <div id="search_result" v-if="searchview === 'mit'">
            <table id="quomit">
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
                  <td class="w2"><label><input type="radio" name="m_codes" :id="'sr_' + mrowIndex" v-model="mcradio" :value="mrowIndex"></label></td>
                  <td class="nrap"><label :for="'sr_' + mrowIndex">{{ mitem['m_code'] }}</label></td>
                  <td class="nrap"><label :for="'sr_' + mrowIndex">{{ mitem['f_create_date'] }}</label></td>
                  <td class="nrap"><label :for="'sr_' + mrowIndex">{{ mitem['customer_code'] }}</label></td>
                  <td class="nrap"><label :for="'sr_' + mrowIndex">{{ mitem['customer'] }}</label></td>
                  <td class=""><label :for="'sr_' + mrowIndex">{{ mitem['product'] }}</label></td>
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










    </div><!-- end class mainframe -->
  </div>
</template>
<script>

// import mit-parts from "./Parts.vue";
//import moment from "moment";
import { dialogable } from "../mixins/dialogable.js";
import { checkable } from "../mixins/checkable.js";
import { requestable } from "../mixins/requestable.js";

export default {
  name: "QuotationsAnotherline",
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
      details_manager: [],
      details_customer: [],
      details_enduser: [],
      details_product: [],
      details_productdetails: [],
      details: [],
      details_parts: [],
      details_parts_min: [],
      details_body: "",
      login_user_code: 0,
      login_user_role: 0,
      dialogVisible: false,
      messageshowsearch: false,
      loading: false,
      result: false,

      s_m_code: "",
      s_manager: "",
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
      container_arr_p001: [],

    };
  },
  // マウント時
  mounted() {
    this.getManager();

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
          this.searchview = "";

          this.sr_title = "";

          const sc = 'search_com';
          var searchcom = document.getElementById(sc);
          searchcom.style.visibility = "hidden";

          console.log('クリアしました');
        }
        else if(cf == 'setmgr') {
          //var Jperformance = document.getElementById('performance_' + val1).value;
          //var elems = document.querySelectorAll('.cls1, .cls2');
          var elems = document.querySelectorAll('.setitem');
          var elemsa = document.querySelectorAll('.setitem_a');
          for (var i = 0; i < elems.length; i++){
            //console.log(elems[i].textContent);
            elems[i].style.background = "none";
            elemsa[i].style.color = "#000";
          }
          //var Jstatus = fm.status.value;
          //var result = window.confirm( com1 +'\n伝票番号 : '+ Jproduct_code +'');
          //var result = window.confirm( com1 +'\n'+ val1 +'\n' + val2);
          var result = true;
          if( result ) {
            this.details_customer = [];
            this.details_enduser = [];
            this.details_product = [];
            this.details = [];
            document.getElementsByClassName("setitem")[val1].style.background = "#548017";
            document.getElementsByClassName("setitem_a")[val1].style.color = "#FFF";
            //fm.s_id.value = val1;
            //fm.s_performance.value = Jperformance;
            //fm.action = '/w';
            //fm.submit();
            this.loading = true;
            this.getCustomer(val2);
          }
          else {
            console.log('キャンセルがクリックされました');
          }

        }
        else if(cf == 'setcust') {
          var elems = document.querySelectorAll('.itemcust');
          var elemsa = document.querySelectorAll('.itemcust_a');
          for (var i = 0; i < elems.length; i++){
            elems[i].style.background = "none";
            elemsa[i].style.color = "#000";
          }
          //var result = window.confirm( com1 +'\n'+ val1 +'\n' + val2);
          var result = true;
          if( result ) {
            this.details_enduser = [];
            this.details_product = [];
            this.details = [];
            document.getElementsByClassName("itemcust")[val1].style.background = "#548017";
            document.getElementsByClassName("itemcust_a")[val1].style.color = "#FFF";
            this.loading = true;
            this.getEnduser(val2);
          }
          else {
            console.log('キャンセルがクリックされました');
          }

        }
        else if(cf == 'setend') {
          var elems = document.querySelectorAll('.itemend');
          var elemsa = document.querySelectorAll('.itemend_a');
          for (var i = 0; i < elems.length; i++){
            elems[i].style.background = "none";
            elemsa[i].style.color = "#000";
          }
          //var result = window.confirm( com1 +'\n'+ val1 +'\n' + val2 + '\n' + smd);
          var result = true;
          if( result ) {
            this.details_product = [];
            this.details = [];
            document.getElementsByClassName("itemend")[val1].style.background = "#548017";
            document.getElementsByClassName("itemend_a")[val1].style.color = "#FFF";
            this.loading = true;
            this.getProduct(val2);
          }
          else {
            console.log('キャンセルがクリックされました');
          }

        }
        else if(cf == 'setprod') {
          var elems = document.querySelectorAll('.itemprod');
          var elemsa = document.querySelectorAll('.itemprod_a');
          for (var i = 0; i < elems.length; i++){
            elems[i].style.background = "none";
            elemsa[i].style.color = "#000";
          }
          //var result = window.confirm( com1 +'\n'+ val1 +'\n' + val2 + '\n');
          var result = true;
          if( result ) {
            this.details = [];
            document.getElementsByClassName("itemprod")[val1].style.background = "#548017";
            document.getElementsByClassName("itemprod_a")[val1].style.color = "#FFF";
            this.loading = true;
            this.getDetails(val2);
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
    // 見積編集Click
    QuoClick() {
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
          //console.log( vvmc ) ;
          this.m_code = this.details[vvmc]['m_code'];
          console.log('m_code:' + this.m_code);
          window.location.href = '/quotations?s_m_code=' + this.m_code;

        }
      }
    },



    preloader() {
      let table = document.getElementById("quomit");
      let rows = table.querySelectorAll("tbody tr");
    
      let backgroundcolor_dict = {};
      let tr_color = window.getComputedStyle(rows[0], "").color;
    
      rows.forEach((row) => {
        // 行ごとに背景色が異なるため全ての行の変更前の背景色を取得
        backgroundcolor_dict[String(row.rowIndex)] = window.getComputedStyle(
          row,
          ""
        ).backgroundColor;
    
        row.addEventListener(
          "click",
          function () {
            // 一度全て元の配色
            rows.forEach((click_row) => {
              click_row.style.backgroundColor =
                backgroundcolor_dict[String(row.rowIndex)];
              click_row.style.color = tr_color;
            });
            // 選択された行のみ配色変更
            row.style.backgroundColor = "rgba(136, 144, 187, 0.5)";
            row.style.color = "#FFFFFF";
    
            if (row.querySelector("input").type == "radio") {
              row.querySelector('input[type="radio"]').checked = true;
            }
            if (row.querySelector("input").type == "checkbox") {
              if (row.querySelector('input[type="checkbox"]').checked == false) {
                row.querySelector('input[type="checkbox"]').checked = true;
              } else {
                row.querySelector('input[type="checkbox"]').checked = false;
              }
            }
          },
          false
        );
      });
    },


    viewStrLen(){
      var len = document.getElementById("textarea1").value.length;
      document.getElementById("strLen").innerText = len + "文字";
    },


    // -------------------- サーバー処理 --------------------
    // 取得処理
    getItem() {
      //this.inputClear();
      //console.log("getitem in");
      var arrayParams = { 
        };
      axios.post("/anotherline/get", arrayParams)
        .then(response  => {
          this.getThen(response);
        })
        .catch(reason => {
          this.serverCatch("取得");
        });
    },
    getManager() {
      //this.inputClear();
      //console.log("getitem in");
      var arrayParams = { 
        };
      axios.post("/qanotherline/getmgr", arrayParams)
        .then(response  => {
          this.getThenManager(response);
          this.loading = false;
        })
        .catch(reason => {
          this.serverCatch("取得");
        });
    },
    getCustomer(val) {
      //this.inputClear();
      console.log("getCustomer in val = " + val);
      var arrayParams = { 
        s_m_code : '',
        s_manager : val,
      };
      //axios.post("/qanotherline/getcust", arrayParams)
      this.postRequest("/qanotherline/getcust", arrayParams)
        .then(response  => {
          this.getThenCustomer(response);
          this.loading = false;
        })
        .catch(reason => {
          this.serverCatch("取得");
        });
    },
    getEnduser(val) {
      //this.inputClear();
      console.log("getEnduser in val = " + val);
      var arrayParams = { 
        s_m_code : '',
        s_customer : val,
      };
      //axios.post("/qanotherline/getcust", arrayParams)
      this.postRequest("/qanotherline/getend", arrayParams)
        .then(response  => {
          this.getThenEnduser(response);
          this.loading = false;
        })
        .catch(reason => {
          this.serverCatch("取得");
        });
    },
    getProduct(val) {
      //this.inputClear();
      console.log("getProduct in val = " + val);
      var arrayParams = { 
        s_m_code : '',
        s_customer : this.s_customer,
        s_enduser : val,
      };
      //axios.post("/qanotherline/getcust", arrayParams)
      this.postRequest("/qanotherline/getprod", arrayParams)
        .then(response  => {
          this.getThenProduct(response);
          this.loading = false;
        })
        .catch(reason => {
          this.serverCatch("取得");
        });
    },
    getDetails(val) {
      //this.inputClear();
      console.log("getDetails in val = " + val);
      var arrayParams = { 
        s_id : val,
        s_m_code : '',
        s_customer : this.s_customer,
        s_enduser : '',
      };
      //axios.post("/qanotherline/getcust", arrayParams)
      this.postRequest("/qanotherline/getdetails", arrayParams)
        .then(response  => {
          this.getThenDetails(response);
          this.loading = false;
        })
        .catch(reason => {
          this.serverCatch("取得");
        });
    },
 

    


    // -------------------- 共通 --------------------
    // 取得正常処理
    getThenXX(response) {
      console.log('正常');
    },
    getThen(response) {
      var res = response.data;
      //console.log('getthen in res = ' + res);
      if (res.result) {
        this.details = res.details;
      } else {
        if (res.messagedata.length > 0) {
          this.htmlMessageSwal("エラー", res.messagedata, "error", true, false);
        } else {
          this.serverCatch("取得");
        }
      }
      console.log('取得正常処理');
    },
    // 担当取得
    getThenManager(response) {
      var res = response.data;
      //console.log('getthen in res = ' + res);
      if (res.result) {
        this.details_manager = res.details_manager;
      } else {
        if (res.messagedata.length > 0) {
          this.htmlMessageSwal("エラー", res.messagedata, "error", true, false);
        } else {
          this.serverCatch("取得");
        }
      }
      console.log('取得正常');
    },
    // 得意先取得
    getThenCustomer(response) {
      var res = response.data;
      //console.log('getthen in res = ' + res);
      if (res.result) {
        this.details_customer = res.details_customer;
      } else {
        if (res.messagedata.length > 0) {
          this.htmlMessageSwal("エラー", res.messagedata, "error", true, false);
        } else {
          this.serverCatch("得意先取得");
        }
      }
      console.log('取得正常');
    },
    // エンドユーザー取得
    getThenEnduser(response) {
      var res = response.data;
      //console.log('getthen in res = ' + res);
      if (res.result) {
        this.s_customer = res.s_customer;
        this.details_enduser = res.details_enduser;
        let addeu = {
          "enduser": "すべて"
        }
        this.details_enduser.push(addeu);
      } else {
        if (res.messagedata.length > 0) {
          this.htmlMessageSwal("エラー", res.messagedata, "error", true, false);
        } else {
          this.serverCatch("エンドユーザー取得");
        }
      }
      console.log('取得正常');
    },
    // 製品名取得
    getThenProduct(response) {
      var res = response.data;
      //console.log('getthen in res = ' + res);
      if (res.result) {
        this.details_product = res.details_product;
        this.s_customer = res.s_customer;
      } else {
        if (res.messagedata.length > 0) {
          this.htmlMessageSwal("エラー", res.messagedata, "error", true, false);
        } else {
          this.serverCatch("エンドユーザー取得");
        }
      }
      console.log('取得正常');
    },
    // 製品詳細取得
    getThenDetails(response) {
      var res = response.data;
      //console.log('getthen in res = ' + res);
      if (res.result) {
        this.details = res.details;
        this.select_arr_s001 = res.select_arr_s001;
        this.select_arr_s002 = res.select_arr_s002;
        this.select_arr_s003 = res.select_arr_s003;
        this.select_arr_s004 = res.select_arr_s004;
        this.select_arr_s005 = res.select_arr_s005;

      } else {
        if (res.messagedata.length > 0) {
          this.htmlMessageSwal("エラー", res.messagedata, "error", true, false);
        } else {
          this.serverCatch("エンドユーザー取得");
        }
      }
      console.log('取得正常');
      this.result = res.result;
      console.log('getThenDetails result ->' + this.result);
      const timeout = '3000';
      setTimeout(() => {
        if(this.result) {
          this.viewStrLen();
        }
      }, timeout);


    },
    // 検索系正常処理
    putThenSearch(response, eventtext) {
      var messages = [];
      var res = response.data;
      if (res.details.length > 0) {
          this.details = res.details;
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

    // パーツ取得正常処理
    putThenParts(response, eventtext) {
      var messages = [];
      var res = response.data;
      if (res.details_parts.length > 0) {
          this.details_parts = res.details_parts;
          //console.log("putThenSearch in res.search_totals = " + res.search_totals[0].total_s);
          console.log("putThenParts in" + this.details_parts );

          //this.event_title = res.s_m_code + ' ';
          //console.log("putThenSearch in res.s_customer = " + res.s_customer);
          //this.$toasted.show(this.event_title + " " + eventtext + "しました");
          //this.actionmsgArr.push(this.event_title + " を検索しました。" , " 検索数 : " + res.details.length + " 件");
      } else {
          //this.actionmsgArr.push(this.s_m_code + " が見つかりませんでした。");
          this.details_parts = [];
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

/*
function preloader() {
  let table = document.getElementById("quomit");
  let rows = table.querySelectorAll("tr");
 
  let backgroundcolor_dict = {};
  let tr_color = window.getComputedStyle(rows[0], "").color;
 
  rows.forEach((row) => {
    // 行ごとに背景色が異なるため全ての行の変更前の背景色を取得
    backgroundcolor_dict[String(row.rowIndex)] = window.getComputedStyle(
      row,
      ""
    ).backgroundColor;
 
    row.addEventListener(
      "click",
      function () {
        // 一度全て元の配色
        rows.forEach((click_row) => {
          click_row.style.backgroundColor =
            backgroundcolor_dict[String(row.rowIndex)];
          click_row.style.color = tr_color;
        });
        // 選択された行のみ配色変更
        row.style.backgroundColor = "rgba(136, 144, 187, 0.5)";
        row.style.color = "#FFFFFF";
 
        if (row.querySelector("input").type == "radio") {
          row.querySelector('input[type="radio"]').checked = true;
        }
        if (row.querySelector("input").type == "checkbox") {
          if (row.querySelector('input[type="checkbox"]').checked == false) {
            row.querySelector('input[type="checkbox"]').checked = true;
          } else {
            row.querySelector('input[type="checkbox"]').checked = false;
          }
        }
      },
      false
    );
  });
}
 
window.onload = preloader;
*/

</script>
