<template>
  <div>
    <p>this file is HomeComponent.vue</p>
  </div>
</template>

<script>
//import moment from "moment";
//import { dialogable } from "../mixins/dialogable.js";
//import { checkable } from "../mixins/checkable.js";
//import { requestable } from "../mixins/requestable.js";
export default {
  name: 'HomeComponent',
  template: `
    <div>
    <p>エクスポートデフォルト</p>
    </div>
  `,
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
      message: "aaa",
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
