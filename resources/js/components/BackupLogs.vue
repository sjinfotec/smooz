<template>
  <div>
    <p>this file is backuplogs.vue</p>
    <div id="backup_btnzone">
      <div>
        <button type="button" id="act_imp_btn" @click="ImportButton('product_all_outsou3');">インポート<p><img src="/images/bak_im.png"></p></button>
      </div>
      <div>
        <button type="button" id="act_exp_btn" @click="ExportButton('product_all_outsou3');">エクスポート<p><img src="/images/bak_ex.png"></p></button>
      </div>
      <div>
        <button type="button" id="act_bak_btn" @click="BackupButton('product_all_outsou3');">バックアップ<p><img src="/images/bak_back.png"></p></button>
      </div>
    </div>
    <!--end mnt_actionbtn-->
  </div>
</template>

<script>
//import moment from "moment";
//import { dialogable } from "../mixins/dialogable.js";
//import { checkable } from "../mixins/checkable.js";
//import { requestable } from "../mixins/requestable.js";
export default {
  name: 'BackupLogs',
  //mixins: [dialogable, checkable, requestable],
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
      informations: [],
      content: "",
      login_user_code: 0,
      login_user_role: 0,
      dialogVisible: false,
      messageshowsearch: false,
      infomationmessage: [],
      message: "",
      showMessage: true,
    };
  },
  // マウント時
  mounted() {
    //this.login_user_code = this.authusers["code"];
    //this.login_user_role = this.authusers["role"];
    this.Test();
  },
  methods: {
    // ------------------------ サーバー処理 ----------------------------
    Test(){
      console.log('テストコンソール出力')
    }
    // -------------------- 共通 ----------------------------
  }
};
</script>
