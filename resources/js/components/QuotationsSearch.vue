<template>
  <div>
    <div id="cnt_title_search">
      <h3>見積検索</h3>
    </div>
    <div id="cnt1" >
      <div class="line">
        <div class="inputgroup">
          <button>見積へ</button>
        </div>
        <div class="inputgroup">
          <button>受注へ</button>
        </div>
        <div class="inputgroup">
          <button>クリア</button>
        </div>
        <div class="inputgroup">
          <button>製品概要</button>
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
        <div class="inputgroup4">
          <label><span class="spanwidth_8">エンドユーザー<span class="care">&#10045;</span></span><input type="text" class="form_style input_w100p_m" name="enduser"></label>
        </div>
        <div class="inputgroup4">
          <label><span class="spanwidth_8">製品名<span class="care">&#10045;</span></span><input type="text" class="form_style input_w100p_m" name="product"></label>
        </div>
        <div class="inputgroup4">
          <label><span class="spanwidth_8">作成年月（期間）</span><span class="spanblock1"><input type="text" class="form_style input_search_w1" name="date_start">～<input type="text" class="form_style input_search_w1" name="date_end"></span></label>
        </div>
      </div>
      <div class="line">
        <div class="caretxt">&#10045; 部分一致可</div>
      </div>

      <div class="line">
        <div class="inputgroup">
          <button>見積書を検索</button>
        </div>
        <div class="inputgroup">
          <button>見積を検索</button>
        </div>
        <div class="inputgroup">
          <button>内容</button>
        </div>
      </div>

      <div id="cnt_search">
        <h3>検索結果</h3>
        <div id="search_result">
          <table id="quodoc">
            <thead>
              <tr>
                <th class=""></th>
                <th class="nrap">見積書番号</th>
                <th class="">作成日</th>
                <th class="nrap">得意先コード</th>
                <th class="nrap">得意先名</th>
                <th class="">形態</th>
                <th class="">製品名</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class=""><input type="radio" name="wm_code" value=""></td>
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
      </div>

    </div><!--end id cnt1-->


  </div>
</template>
<script>
// import mit-parts from "./Parts.vue";
//import moment from "moment";
//import { dialogable } from "../mixins/dialogable.js";
//import { checkable } from "../mixins/checkable.js";
import { requestable } from "../mixins/requestable.js";


export default {
  name: "Mmake",
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
  /*
  components: {
    mit-parts: mit-parts,
  },
  */
  data() {
    return {
      details: [],
      login_user_code: 0,
      login_user_role: 0,
      dialogVisible: false,
      messageshowsearch: false,

    };
  },
  // マウント時
  mounted() {
    //this.login_user_code = this.authusers["code"];
    //this.login_user_role = this.authusers["role"];
  },
  methods: {
    // -------------------- イベント処理 --------------------





    SetParts(pnum,pname) {
      const tid = "cnt1";
      var targetid = document.getElementById(tid);
      targetid.style.visibility = "hidden";
      //現在未使用
      var arrayParams = { 
        pagenum : pnum ,
        pagename : pname,
        partsview : true
      };
      this.postRequest("/parts/get", arrayParams)
        .then(response  => {
          this.getThen(response);
        })
        .catch(reason => {
          this.serverCatch("取得");
        });


      this.pagenum = pnum;
      this.pagename = pname;

      this.partsview = true;
      console.log('SetParts コンソール出力 = ' + pname);


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
