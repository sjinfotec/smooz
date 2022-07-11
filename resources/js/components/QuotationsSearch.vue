<template>
  <div>
    <div id="cnt_title_search">
      <h3>見積検索</h3>
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
          <button>クリア</button>
        </div>
      </div>
      <div class="line">
        <div class="inputgroup3">
          <label><span class="spanwidth_8">見積番号</span><input type="text" class="form_style input_w100p_m" name="m_code"></label>
        </div>
        <div class="inputgroup3">
          <label><span class="spanwidth_8">得意先コード</span><input type="text" class="form_style input_w100p_m" name="customer_code"></label>
        </div>
        <div class="inputgroup3">
          <label><span class="spanwidth_8">得意先名<span class="care">&#10045;</span></span><input type="text" class="form_style input_w100p_m" name="customer"></label>
        </div>
      </div>
      <div class="line">
        <div class="inputgroup3">
          <label><span class="spanwidth_8">エンドユーザー<span class="care">&#10045;</span></span><input type="text" class="form_style input_w100p_m" name="enduser"></label>
        </div>
        <div class="inputgroup3">
          <label><span class="spanwidth_8">製品名<span class="care">&#10045;</span></span><input type="text" class="form_style input_w100p_m" name="product"></label>
        </div>
        <div class="inputgroup4">
          <label><span class="spanwidth_8">作成年月（期間）</span><span class="spanblock1"><input type="text" class="form_style input_search_w1" name="date_start">～<input type="text" class="form_style input_search_w1" name="date_end"></span></label>
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
        <div class="inputgroup">
          <div class="caretxt">&#10045; 部分一致可</div>
        </div>
      </div>

      <div id="cnt_search">
        <form id="searchform">
        <h4>{{ sr_title }}<span id="search_com" class="v_hidden"></span></h4>
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
              <tr v-for="(item,rowIndex) in 45" :key="rowIndex">
                <td class="w2">
                  <!--<input type="radio" name="wm_code" value="">-->
                  <button type="button" class="srbtn" @click="MitGoBtn(item['id'],item['m_code'])">
                    見積
                  </button>
                </td>
                <td class="nrap">22060123</td>
                <td class="nrap">2022年6月18日</td>
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
              <tr v-for="(item,rowIndex) in 68" :key="rowIndex">
                <td class="w2"><label style="display:block;"><input type="radio" name="m_codes" v-model="mcradio" :value="rowIndex"></label></td>
                <td class="nrap">22060123</td>
                <td class="nrap">2022年5月24日</td>
                <td class="nrap">23456</td>
                <td class="nrap">ロイズコーポレーション</td>
                <td class="">合同支援利用促進パンフレット　４色</td>
                <td class="nrap">0P2000部</td>
                <td class="nrap">1200000</td>
                <td class="nrap">2022年05月31日</td>
              </tr>
            </tbody>
          </table>
        </div>
        </form>
      </div>

    </div><!--end id cnt1-->


    <div id="printzone" v-if="printview === true">
      <popup-print
       v-bind:print-data="printdata"
      ></popup-print>
    </div>


  </div>
</template>
<script>
// import mit-parts from "./Parts.vue";
//import moment from "moment";
//import { dialogable } from "../mixins/dialogable.js";
//import { checkable } from "../mixins/checkable.js";
import { requestable } from "../mixins/requestable.js";


export default {
  name: "QuotationsSearch",
  //mixins: [dialogable, checkable, requestable],
  mixins: [requestable],
  props: {
  /*
    authusers: {
      type: Array,
      default: []
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

      searchview: "",
      printview: "",
      sr_title: "",
      mcradio: "",
      printdata: "",

    };
  },
  // マウント時
  mounted() {
    //this.login_user_code = this.authusers["code"];
    //this.login_user_role = this.authusers["role"];
  },
  methods: {
    // -------------------- イベント処理 --------------------





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

      
      var arrayParams = { 
        kind : k
      };
      /*
      this.postRequest("/search/get", arrayParams)
        .then(response  => {
          this.getThen(response);
        })
        .catch(reason => {
          this.serverCatch("取得");
        });
      */

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
          // 未選択状態
          alert('検索結果一覧より見積を選択して下さい。');
        } else {
          var myWindow = window.open("", "myWindow", "width=900, height=600, top=0, left=0");
          myWindow.document.write("<div id='popup_cnt'><div>見積内容</div><button id='popup_printbtn' type='button' onclick='window.print(); return false;'>印刷</button></div>" + vvmc);
          //console.log( vvmc ) ;
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
          this.printview = true;
          //var ovWindow = window.open("", "ovWindow", "width=300, height=600, top=0, left=0");
          //ovWindow.document.write("<div>製品概要</div>" + vvmc);
          //console.log( vvmc ) ;
        }
      }
    },



    // -------------------- サーバー処理 --------------------
    // -------------------- 共通 --------------------
    // 取得正常処理
    getThen(response) {
      console.log('正常');
    },
    // 異常処理
    serverCatch(eventtext) {
      console.log('異常処理');
    },
  }
};
</script>
