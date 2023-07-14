<template>
  <div>
    <div id="cnt_title_search">
      <h3 class="print-none">見積書印刷</h3>
    </div>
    <div id="cnt3" >
      <div id="linezone">
        <div class="flexgroup">
          <label><span class="spanwidth_10">発行日付</span><input type="text" class="form_style input_w100p_10" name=""></label>
        </div>
      </div>
      <div id="linezone">
        <div class="flexgroup">
          <label><span class="spanwidth_10">得意先名</span><input type="text" class="form_style input_w100p_10" name="customer"></label>
        </div>
      </div>
      <div id="linezone">
        <div class="flexgroup">
          <label><span class="spanwidth_10">納期</span><input type="text" class="form_style input_w100p_10" name=""></label>
        </div>
      </div>
      <div id="linezone">
        <div class="flexgroup">
          <label><span class="spanwidth_10">見積期限</span><input type="text" class="form_style input_w100p_10" name=""></label>
        </div>
      </div>
      <div id="linezone">
        <div class="flexgroup">
          <label><span class="spanwidth_10">支払条件</span><input type="text" class="form_style input_w100p_10" name=""></label>
        </div>
      </div>
      <div id="linezone">
        <div class="flexgroup">
          <label><span class="spanwidth_10">納入場所</span><input type="text" class="form_style input_w100p_10" name=""></label>
        </div>
      </div>



      <div id="linezone" class="flex_jc_c">
        <div class="flexgroup2">
          <button type="button" id="search_ovv_btn" @click="Click();">再印刷・番号</button>
        </div>
        <div class="flexgroup2">
          <label><input type="text" class="form_style input_w100p_1" name=""></label>
        </div>
        <div class="flexgroup2">
          <button type="button" id="search_cnt_btn" @click="Click();">参照・番号</button>
        </div>
      </div>


      <div id="linezone" class="columngap_10px">
        <div class="flexgroup2">
          <span id="doc_mark" class="markzone mz_c2 v_hidden"></span>
          <button type="button" id="search_doc_btn" @click="ClearClick();">クリア</button>
        </div>
        <div class="flexgroup2">
          <span id="doc_mark" class="markzone mz_c2 v_hidden"></span>
          <button type="button" id="search_doc_btn" @click="SearchClick('doc',0,'通常見積');">通常見積</button>
        </div>
        <div class="flexgroup2">
          <span id="mit_mark" class="markzone mz_c2 v_hidden"></span>
          <button type="button" id="search_mit_btn" @click="SearchClick('mit',0,'単価見積');">単価見積</button>
        </div>
      </div>




      <div class="sect">見積番号</div>
      <div id="linezone" class="mgt0">
        <div class="flexgroup2 w1">
          <label><input type="text" class="form_style input_w100p_1" name="m_code_1"></label>
        </div>
        <div class="flexgroup">
          <label><input type="text" class="form_style input_w100p_1" name="product_1"></label>
        </div>
      </div>
      <div id="linezone">
        <div class="flexgroup2 w1">
          <label><input type="text" class="form_style input_w100p_1" name="m_code_2"></label>
        </div>
        <div class="flexgroup">
          <label><input type="text" class="form_style input_w100p_1" name="product_2"></label>
        </div>
      </div>
      <div id="linezone">
        <div class="flexgroup2 w1">
          <label><input type="text" class="form_style input_w100p_1" name="m_code_3"></label>
        </div>
        <div class="flexgroup">
          <label><input type="text" class="form_style input_w100p_1" name="product_3"></label>
        </div>
      </div>
      <div id="linezone">
        <div class="flexgroup2 w1">
          <label><input type="text" class="form_style input_w100p_1" name="m_code_4"></label>
        </div>
        <div class="flexgroup">
          <label><input type="text" class="form_style input_w100p_1" name="product_4"></label>
        </div>
      </div>
      <div id="linezone">
        <div class="flexgroup2 w1">
          <label><input type="text" class="form_style input_w100p_1" name="m_code_5"></label>
        </div>
        <div class="flexgroup">
          <label><input type="text" class="form_style input_w100p_1" name="product_5"></label>
        </div>
      </div>
      <div id="linezone">
        <div class="flexgroup2 w1">
          <label><input type="text" class="form_style input_w100p_1" name="m_code_6"></label>
        </div>
        <div class="flexgroup">
          <label><input type="text" class="form_style input_w100p_1" name="product_6"></label>
        </div>
      </div>
      <div id="linezone">
        <div class="flexgroup2 w1">
          <label><input type="text" class="form_style input_w100p_1" name="m_code_7"></label>
        </div>
        <div class="flexgroup">
          <label><input type="text" class="form_style input_w100p_1" name="product_7"></label>
        </div>
      </div>
      <div id="linezone">
        <div class="flexgroup2 w1">
          <label><input type="text" class="form_style input_w100p_1" name="m_code_8"></label>
        </div>
        <div class="flexgroup">
          <label><input type="text" class="form_style input_w100p_1" name="product_8"></label>
        </div>
      </div>
      <div id="linezone">
        <div class="flexgroup2 w1">
          <label><input type="text" class="form_style input_w100p_1" name="m_code_9"></label>
        </div>
        <div class="flexgroup">
          <label><input type="text" class="form_style input_w100p_1" name="product_9"></label>
        </div>
      </div>
      <div id="linezone">
        <div class="flexgroup2 w1">
          <label><input type="text" class="form_style input_w100p_1" name="m_code_10"></label>
        </div>
        <div class="flexgroup">
          <label><input type="text" class="form_style input_w100p_1" name="product_10"></label>
        </div>
      </div>


      <div class="sect inlineblock input_w5">備考</div><span>{{ comment_1.length }} / 200</span>
      <div id="linezone" class="mgt0">
        <div class="flexgroup">
          <label><textarea class="textarea1" name="comment_1" rows="4"  v-model="comment_1" maxlength="200"></textarea></label>
        </div>
      </div>


      <div id="linezone" class="columngap_10px mgt20">
        <div class="flexgroup2 ">
          <label><span>値引き額</span><input type="text" class="form_style input_w7" name="discount_amount"></label>
        </div>
        <div class="flexgroup">
          <label><span>値引きコメント</span><input type="text" class="form_style input_w50p" name="discount_comment"></label>
        </div>
      </div>


      <div id="linezone" class="columngap_10px mgt20">
        <div class="inputgroup">
          <button type="button" id="set_doc_btn" @click="Click('doc',0,'見積書');">採番</button>
          <span>20220812341234</span>
        </div>

        <div class="inputgroup">
          <button type="button" id="search_ovv_btn" @click="previewClick();">プレビュー</button>
        </div>
        <div class="inputgroup">
          <button type="button" id="search_cnt_btn" @click="ContentsClick();">内容</button>
        </div>




      </div>

    </div><!--end id cnt3-->


    <div id="printdoczone" class="font_go"  v-if="printview === '1'">
      <section class="page">


        <div id="printdoc_title">
          <h1 class="font_min">御見積書</h1>
          <div class="abs_l">No. 20220812345678</div>
        </div>
        <div class="docdate">令和 4 年 8 月 12 日</div>

        <div id="printdoc_customer">
          <h2>変数 株式会社 三条不動産 賃貸事業部 法人課　様</h2>
        </div>

        <div id="printdoc_primary">
          <div class="parts1">
            <div id="pd_terms">
              <ul>
                <li>納期：変数</li>
                <li>見積有効期限：変数</li>
                <li>支払条件：変数</li>
                <li>納入場所：変数</li>
              </ul>
            </div>
          </div>
          <div class="parts2">
            <div class="logo"><img src="images/logo_sanjyo.svg"></div>
            <div id="your_office">
              <h4 class="company">三条印刷株式会社</h4>
              <h5 class="president"><span class="op">代表取締役</span><span class="name font_min">川口 理一郎</span></h5>
              <div class="address">札幌市東区北１０条東１３丁目１４</div>
              <div class="telfax"><span>TEL:011-742-2769</span><span class="fax">FAX:011-702-8197</span></div>
              <h6 class="email">E-Mail: <span>sanjyo@ssjjoo.com</span></h6>
            </div> 


          </div>
        </div>




        <div id="printdoc_main">
          <div id="pd_cnt">
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
        </div>



        <div id="print_btnzone" class="print-none">
          <button type='button' onclick='window.print(); return false;'>印刷</button>
          <button type='button' @click="Pricancel();">閉じる</button>
        </div>





      </section>
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
      m_code: "",
      printtitle: "",
      comment_1: "",

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


    previewClick() {
      //console.log( 'radioNodeList = ' + radioNodeList ) ;
      //if (typeof a === "undefined") {

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

          const nopri = 'cnt3';
          var nopriid = document.getElementById(nopri);
          nopriid.style.display = "none";
          this.printview = '1';
          //printgaiyo.style.display = "block";





    },
    Pricancel() {
      const tid = "cnt3";
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
    // 異常処理
    serverCatch(eventtext) {
      console.log('異常処理');
    },
  }
};
</script>
