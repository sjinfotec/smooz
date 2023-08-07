<template>
  <div>
    <div>
      <h3>パーツ設定 － {{ pageNum }}P目 －</h3>
    </div>
    <div id="cnt1">
      <div class="line">
        <div class="inputgroup">
          <label><span class="mz_tc1">用紙コード</span><input type="text" class="form_style input_w5" name="paper_code"></label>
        </div>
        <div class="inputgroup">
          <label><span class="mz_tc1">用紙名</span><input type="text" class="form_style input_w10" name="paper_name" disabled><input type="hidden" name="paper_name"></label>
        </div>
        <div class="inputgroup">
          <span class="mz_tc1">サイズ</span>
          <label>横<input type="text" class="form_style input_w3" name="size_w"></label>
          ×
          <label>縦<input type="text" class="form_style input_w3" name="size_h"></label>
          <input type="text" class="form_style input_w2" name="size_top">/<input type="text" class="form_style input_w2" name="size_bottom">
        </div>
        <div class="inputgroup">
          <label><span class="mz_tc1">紙取</span><input type="text" class="form_style input_w3" name="papertray">切</label>
        </div>
        <div class="inputgroup">
          <span class="mz_tc1">面付け</span>
          <label>横<input type="text" class="form_style input_w3" name="imposition_w"></label>
          <label>縦<input type="text" class="form_style input_w3" name="imposition_h"></label>
        </div>
        <div class="inputgroup">
          <span id="p_envelope_mark" class="markzone mz_c1 v_hidden"></span>
          <button type="button" class="input_w5" id="p_envelope_btn" @click="OnButtonClick('p_envelope');">封筒</button>
          <input type="text" class="input_w1" value="0" name="p_envelope" id="p_envelope">
        </div>
      </div>

      <div class="line">
        <div class="inputgroup">
          <span id="p_supply_mark" class="markzone mz_c1 v_hidden"></span>
          <button type="button" id="p_supply_btn" @click="OnButtonClick('p_supply');">支給受</button>
          <input type="text" class="input_w1" value="0" name="p_supply" id="p_supply">
        </div>
        <div class="inputgroup">
          <span class="mz_tc1">用紙代金</span><input type="text" class="form_style input_w5" name="paper_price" disabled><input type="hidden" name="paper_price">
        </div>
        <div class="inputgroup">
          <span id="p_desensitization_mark" class="markzone mz_c1 v_hidden"></span>
          <button type="button" id="p_desensitization_btn" @click="OnButtonClick('p_desensitization');">減感</button>
          <input type="text" class="input_w1" value="0" name="p_desensitization" id="p_desensitization">
        </div>
        <div class="inputgroup">
          <span id="p_carbon_mark" class="markzone mz_c1 v_hidden"></span>
          <button type="button" id="p_carbon_btn" @click="OnButtonClick('p_carbon');">カーボン</button>
          <input type="text" class="input_w1" value="0" name="p_carbon" id="p_carbon">
        </div>
        <div class="inputgroup">
          <span id="p_white_mark" class="markzone mz_c1 v_hidden"></span>
          <button type="button" id="p_white_btn" @click="OnButtonClick('p_white');">ホワイト</button>
          <input type="text" class="input_w1" value="0" name="p_white" id="p_white">
        </div>
        <div class="inputgroup">
          <span id="p_separate_mark" class="markzone mz_c1 v_hidden"></span>
          <button type="button" id="p_separate_btn" @click="OnButtonClick('p_separate');">セパレート</button>
          <input type="text" class="input_w1" value="0" name="p_separate" id="p_separate">
        </div>
        <div class="inputgroup">
          <span class="mz_tc1">色数</span>
          <label>表<input type="text" class="form_style input_w3" name="p_color_front"></label>
          <label>裏<input type="text" class="form_style input_w3" name="p_color_back"></label>
        </div>
      </div>


      <div id="department01">
        <div class="cate"><h4>フォーム部</h4></div>
        <div class="area">
          <div class="group">
            <div class="inputgroup">
              <span class="spanwidth_12">ミシン</span>
              <label>横<input type="text" class="form_style input_w2" name="p_form_sewingmachine_w">本</label>
            </div>
            <div class="inputgroup">
              <label>縦<input type="text" class="form_style input_w2" name="p_form_sewingmachine_h">本</label>
            </div>
            <div class="inputgroup">
              <span id="p_form_sewingmachine_ks_mark" class="markzone mz_c6 v_hidden"></span>
              <button type="button" class="input_w5" id="p_form_sewingmachine_ks_btn" @click="OnButtonClick('p_form_sewingmachine_ks');">基・セ</button>
              <input type="text" class="input_w1" value="0" name="p_form_sewingmachine_ks" id="p_form_sewingmachine_ks">
            </div>
            <div class="inputgroup">
              <span class="spanwidth_12 mgl40">ジャンプミシン</span>
              <label>横<input type="text" class="form_style input_w2" name="p_form_jump_sewingmachine_w">本</label>
            </div>
            <div class="inputgroup">
              <label>縦<input type="text" class="form_style input_w2" name="p_form_jump_sewingmachine_h">本</label>
            </div>
            <div class="inputgroup">
              <span id="p_form_jump_sewingmachine_ks_mark" class="markzone mz_c6 v_hidden"></span>
              <button type="button" class="input_w5" id="p_form_jump_sewingmachine_ks_btn" @click="OnButtonClick('p_form_jump_sewingmachine_ks');">基・セ</button>
              <input type="text" class="input_w1" value="0" name="p_form_jump_sewingmachine_ks" id="p_form_jump_sewingmachine_ks">
            </div>
          </div>

          <div class="group">
            <div class="inputgroup">
              <span class="spanwidth_12">マイクロミシン</span>
              <label>横<input type="text" class="form_style input_w2" name="p_form_micro_sewingmachine_w">本</label>
            </div>
            <div class="inputgroup">
              <label>縦<input type="text" class="form_style input_w2" name="p_form_micro_sewingmachine_h">本</label>
            </div>
            <div class="inputgroup">
              <span id="p_form_micro_sewingmachine_ks_mark" class="markzone mz_c6 v_hidden"></span>
              <button type="button" class="input_w5" id="p_form_micro_sewingmachine_ks_btn" @click="OnButtonClick('p_form_micro_sewingmachine_ks');">基・セ</button>
              <input type="text" class="input_w1" value="0" name="p_form_micro_sewingmachine_ks" id="p_form_micro_sewingmachine_ks">
            </div>
            <div class="inputgroup">
              <span class="spanwidth_12 mgl40">ジャンプマイクロミシン</span>
              <label>横<input type="text" class="form_style input_w2" name="p_form_jump_micro_sewingmachine_w">本</label>
            </div>
            <div class="inputgroup">
              <label>縦<input type="text" class="form_style input_w2" name="p_form_jump_micro_sewingmachine_h">本</label>
            </div>
            <div class="inputgroup">
              <span id="p_form_jump_micro_sewingmachine_ks_mark" class="markzone mz_c6 v_hidden"></span>
              <button type="button" class="input_w5" id="p_form_jump_micro_sewingmachine_ks_btn" @click="OnButtonClick('p_form_jump_micro_sewingmachine_ks');">基・セ</button>
              <input type="text" class="input_w1" value="0" name="p_form_jump_micro_sewingmachine_ks" id="p_form_jump_micro_sewingmachine_ks">
            </div>
          </div>

          <div class="group">
            <div class="inputgroup">
              <span class="spanwidth_12">スジ入れ</span>
              <label>横<input type="text" class="form_style input_w2" name="p_form_linein_w">本</label>
            </div>
            <div class="inputgroup">
              <label>縦<input type="text" class="form_style input_w2" name="p_form_linein_h">本</label>
            </div>
            <div class="inputgroup">
              <span id="p_form_linein_ks_mark" class="markzone mz_c6 v_hidden"></span>
              <button type="button" class="input_w5" id="p_form_linein_ks_btn" @click="OnButtonClick('p_form_linein_ks');">基・セ</button>
              <input type="text" class="input_w1" value="0" name="p_form_linein_ks" id="p_form_linein_ks">
            </div>
            <div class="inputgroup">
              <span class="spanwidth_12 mgl40">スリッター</span>
              <label>横<input type="text" class="form_style input_w2" name="p_form_slitter_w">本</label>
            </div>
            <div class="inputgroup">
              <label>縦<input type="text" class="form_style input_w2" name="p_form_slitter_h">本</label>
            </div>
            <div class="inputgroup">
              <span id="p_form_slitter_ks_mark" class="markzone mz_c6 v_hidden"></span>
              <button type="button" class="input_w5" id="p_form_slitter_ks_btn" @click="OnButtonClick('p_form_slitter_ks');">基・セ</button>
              <input type="text" class="input_w1" value="0" name="p_form_slitter_ks" id="p_form_slitter_ks">
            </div>
          </div>

          <div class="group flex_jc_sb">
            <div class="inputgroup">
              <label>No.<input type="text" class="form_style input_w2" name="p_form_no">ヶ所</label>
              <span id="p_form_no_ks_mark" class="markzone mz_c6 v_hidden"></span>
              <button type="button" class="input_w5" id="p_form_no_ks_btn" @click="OnButtonClick('p_form_no_ks');">基・セ</button>
              <input type="text" class="input_w1" value="0" name="p_form_no_ks" id="p_form_no_ks">
            </div>
            <div class="inputgroup">
              <label>コーナーカット<input type="text" class="form_style input_w2" name="p_form_cornercut">ヶ所</label>
            </div>
            <div class="inputgroup">
              <label>差替<input type="text" class="form_style input_w2" name="p_form_replace">種</label>
              <span id="p_form_replace_color_mark" class="markzone mz_c1 v_hidden"></span>
              <button type="button" class="input_w5" id="p_form_replace_color_btn" @click="OnButtonClick('p_form_replace_color');">カラー</button>
              <input type="text" class="input_w1" value="0" name="p_form_replace_color" id="p_form_replace_color">
            </div>
          </div>

        </div><!--end area-->
      </div><!--end department01-->


      <div id="department01">
        <div class="cate"><h4>オフセット部</h4></div>
        <div class="area flex_auto">
          <div class="group">
            <div class="inputgroup">
              <span class="spanwidth_12">ミシン</span>
              <label><input type="text" class="form_style input_w2" name="p_offset_sewingmachine_w">本</label>
            </div>
            <div class="inputgroup">
              <span id="p_offset_sewingmachine_ks_mark" class="markzone mz_c6 v_hidden"></span>
              <button type="button" class="input_w5" id="p_offset_sewingmachine_ks_btn" @click="OnButtonClick('p_offset_sewingmachine_ks');">基・セ</button>
              <input type="text" class="input_w1" value="0" name="p_offset_sewingmachine_ks" id="p_offset_sewingmachine_ks">
            </div>
            <div class="inputgroup">
              <label class="mgl40">No.<input type="text" class="form_style input_w2" name="p_offset_no">ヶ所</label>
              <span id="p_offset_no_ks_mark" class="markzone mz_c6 v_hidden"></span>
              <button type="button" class="input_w5" id="p_offset_no_ks_btn" @click="OnButtonClick('p_offset_no_ks');">基・セ</button>
              <input type="text" class="input_w1" value="0" name="p_offset_no_ks" id="p_offset_no_ks">
            </div>

          </div>

        </div><!--end area-->
      </div><!--end department01-->


      <div id="department01">
        <div class="cate"><h4 class="lspacing1">活版</h4></div>
        <div class="area">
          <div class="group">
            <div class="inputgroup">
              <span class="spanwidth_12">ミシン</span>
              <label><input type="text" class="form_style input_w2" name="p_letterpress_sewingmachine_hon">本</label>
            </div>
            <div class="inputgroup">
              <label><input type="text" class="form_style input_w2" name="p_letterpress_sewingmachine_dai">台</label>
            </div>
            <div class="inputgroup">
              <span id="p_letterpress_sewingmachine_ks_mark" class="markzone mz_c6 v_hidden"></span>
              <button type="button" class="input_w5" id="p_letterpress_sewingmachine_ks_btn" @click="OnButtonClick('p_letterpress_sewingmachine_ks');">基・セ</button>
              <input type="text" class="input_w1" value="0" name="p_letterpress_sewingmachine_ks" id="p_letterpress_sewingmachine_ks">
            </div>
            <div class="inputgroup">
              <span class="spanwidth_12 mgl40">ジャンプミシン</span>
              <label><input type="text" class="form_style input_w2" name="p_letterpress_jump_sewingmachine_hon">本</label>
            </div>
            <div class="inputgroup">
              <label><input type="text" class="form_style input_w2" name="p_letterpress_jump_sewingmachine_dai">台</label>
            </div>
            <div class="inputgroup">
              <span id="p_letterpress_jump_sewingmachine_ks_mark" class="markzone mz_c6 v_hidden"></span>
              <button type="button" class="input_w5" id="p_letterpress_jump_sewingmachine_ks_btn" @click="OnButtonClick('p_letterpress_jump_sewingmachine_ks');">基・セ</button>
              <input type="text" class="input_w1" value="0" name="p_letterpress_jump_sewingmachine_ks" id="p_letterpress_jump_sewingmachine_ks">
            </div>
          </div>

          <div class="group">
            <div class="inputgroup">
              <span class="spanwidth_12">マイクロミシン</span>
              <label><input type="text" class="form_style input_w2" name="p_letterpress_micro_sewingmachine_hon">本</label>
            </div>
            <div class="inputgroup">
              <label><input type="text" class="form_style input_w2" name="p_letterpress_micro_sewingmachine_dai">台</label>
            </div>
            <div class="inputgroup">
              <span id="p_letterpress_micro_sewingmachine_ks_mark" class="markzone mz_c6 v_hidden"></span>
              <button type="button" class="input_w5" id="p_letterpress_micro_sewingmachine_ks_btn" @click="OnButtonClick('p_letterpress_micro_sewingmachine_ks');">基・セ</button>
              <input type="text" class="input_w1" value="0" name="p_letterpress_micro_sewingmachine_ks" id="p_letterpress_micro_sewingmachine_ks">
            </div>
            <div class="inputgroup">
              <span class="spanwidth_12 mgl40">ジャンプマイクロミシン</span>
              <label><input type="text" class="form_style input_w2" name="p_letterpress_jump_micro_sewingmachine_hon">本</label>
            </div>
            <div class="inputgroup">
              <label><input type="text" class="form_style input_w2" name="p_letterpress_jump_micro_sewingmachine_dai">台</label>
            </div>
            <div class="inputgroup">
              <span id="p_letterpress_jump_micro_sewingmachine_ks_mark" class="markzone mz_c6 v_hidden"></span>
              <button type="button" class="input_w5" id="p_letterpress_jump_micro_sewingmachine_ks_btn" @click="OnButtonClick('p_letterpress_jump_micro_sewingmachine_ks');">基・セ</button>
              <input type="text" class="input_w1" value="0" name="p_letterpress_jump_micro_sewingmachine_ks" id="p_letterpress_jump_micro_sewingmachine_ks">
            </div>
          </div>

          <div class="group">
            <div class="inputgroup">
              <span class="spanwidth_12">スジ入れ</span>
              <label><input type="text" class="form_style input_w2" name="p_letterpress_linein_hon">本</label>
            </div>
            <div class="inputgroup">
              <label><input type="text" class="form_style input_w2" name="p_letterpress_linein_dai">台</label>
            </div>
            <div class="inputgroup">
              <span id="p_letterpress_linein_ks_mark" class="markzone mz_c6 v_hidden"></span>
              <button type="button" class="input_w5" id="p_letterpress_linein_ks_btn" @click="OnButtonClick('p_letterpress_linein_ks');">基・セ</button>
              <input type="text" class="input_w1" value="0" name="p_letterpress_linein_ks" id="p_letterpress_linein_ks">
            </div>
            <div class="inputgroup">
              <span class="spanwidth_12 mgl40">スリッター</span>
              <label><input type="text" class="form_style input_w2" name="p_letterpress_slitter_hon">本</label>
            </div>
            <div class="inputgroup">
              <label><input type="text" class="form_style input_w2" name="p_letterpress_slitter_dai">台</label>
            </div>
            <div class="inputgroup">
              <span id="p_letterpress_slitter_ks_mark" class="markzone mz_c6 v_hidden"></span>
              <button type="button" class="input_w5" id="p_letterpress_slitter_ks_btn" @click="OnButtonClick('p_letterpress_slitter_ks');">基・セ</button>
              <input type="text" class="input_w1" value="0" name="p_letterpress_slitter_ks" id="p_letterpress_slitter_ks">
            </div>
          </div>

          <div class="group flex_jc_sb">
            <div class="inputgroup">
              <span id="p_letterpress_diecut_mark" class="markzone mz_c1 v_hidden"></span>
              <button type="button" class="input_w5" id="p_letterpress_diecut_btn" @click="OnButtonClick('p_letterpress_diecut');">型ヌキ</button>
              <input type="text" class="input_w1" value="0" name="p_letterpress_diecut" id="p_letterpress_diecut">
              <span id="p_letterpress_diecut_ks_mark" class="markzone mz_c6 v_hidden"></span>
              <button type="button" class="input_w5" id="p_letterpress_diecut_ks_btn" @click="OnButtonClick('p_letterpress_diecut_ks');">基・セ</button>
              <input type="text" class="input_w1" value="0" name="p_letterpress_diecut_ks" id="p_letterpress_diecut_ks">
            </div>
            <div class="inputgroup">
              <label>親子No.<input type="text" class="form_style input_w2" name="p_letterpress_pcno">ヶ所</label>
              <span id="p_letterpress_pcno_ks_mark" class="markzone mz_c6 v_hidden"></span>
              <button type="button" class="input_w5" id="p_letterpress_pcno_ks_btn" @click="OnButtonClick('p_letterpress_pcno_ks');">基・セ</button>
              <input type="text" class="input_w1" value="0" name="p_letterpress_pcno_ks" id="p_letterpress_pcno_ks">
            </div>
            <div class="inputgroup">
              <label>No.<input type="text" class="form_style input_w2" name="p_letterpress_no">ヶ所</label>
              <span id="p_letterpress_no_ks_mark" class="markzone mz_c6 v_hidden"></span>
              <button type="button" class="input_w5" id="p_letterpress_no_ks_btn" @click="OnButtonClick('p_letterpress_no_ks');">基・セ</button>
              <input type="text" class="input_w1" value="0" name="p_letterpress_no_ks" id="p_letterpress_no_ks">
            </div>
          </div>

        </div><!--end area-->
      </div><!--end department01-->


      <div id="department01">
        <div class="cate"><h4>情報処理</h4></div>
        <div class="area flex_auto">

          <div class="group flex_jc_sb">
            <div class="inputgroup">
              <label>東レ<input type="text" class="form_style input_w2" name="p_info_toray">台</label>
            </div>
            <div class="inputgroup">
              <span>ドット</span>
              <label><input type="text" class="form_style input_w2" name="p_info_dot_line">ライン</label>
              ×
              <label><input type="text" class="form_style input_w2" name="p_info_dot_dai">台</label>
            </div>
            <div class="inputgroup">
              <span id="p_info_ijp_mark" class="markzone mz_c6 v_hidden"></span>
              <button type="button" id="p_info_ijp_btn" @click="OnButtonClick('p_info_ijp');">フォーム ＩＪＰ</button>
              <input type="text" class="input_w1" value="0" name="p_info_ijp" id="p_info_ijp">
            </div>
            <div class="inputgroup">
              <label>基本料金
              <select name="p_info_basic_fee" class="form_style">
              <option value=""></option>
              <option value="10000">10000</option>
              <option value="15000">15000</option>
              <option value="20000">20000</option>
              <option value="25000">25000</option>
              <option value="30000">30000</option>
              </select>
              </label>
            </div>
          </div>

          <div class="group">
            <div class="inputgroup">
              <label>宛名等出力件数<input type="text" class="form_style input_w5" name="p_info_output">件</label>
            </div>
            <div class="inputgroup">
              <label>パンチング<input type="text" class="form_style input_w5" name="p_info_punching">件</label>
            </div>
          </div>

        </div><!--end area-->
      </div><!--end department01-->


      <div id="department01">
        <div class="cate"><h4>ダイカッタ</h4></div>
        <div class="area">
          <div class="group">
            <div class="inputgroup">
              <span class="spanwidth_12">ミシン</span>
              <label><input type="text" class="form_style input_w2" name="p_diecutter_sewingmachine_hon">本</label>
            </div>
            <div class="inputgroup">
              <label><input type="text" class="form_style input_w2" name="p_diecutter_sewingmachine_dai">台</label>
            </div>
            <div class="inputgroup">
              <span id="p_diecutter_sewingmachine_ks_mark" class="markzone mz_c6 v_hidden"></span>
              <button type="button" class="input_w5" id="p_diecutter_sewingmachine_ks_btn" @click="OnButtonClick('p_diecutter_sewingmachine_ks');">基・セ</button>
              <input type="text" class="input_w1" value="0" name="p_diecutter_sewingmachine_ks" id="p_diecutter_sewingmachine_ks">
            </div>
            <div class="inputgroup">
              <span class="spanwidth_12 mgl40">ジャンプミシン</span>
              <label><input type="text" class="form_style input_w2" name="p_diecutter_jump_sewingmachine_hon">本</label>
            </div>
            <div class="inputgroup">
              <label><input type="text" class="form_style input_w2" name="p_diecutter_jump_sewingmachine_dai">台</label>
            </div>
            <div class="inputgroup">
              <span id="p_diecutter_jump_sewingmachine_ks_mark" class="markzone mz_c6 v_hidden"></span>
              <button type="button" class="input_w5" id="p_diecutter_jump_sewingmachine_ks_btn" @click="OnButtonClick('p_diecutter_jump_sewingmachine_ks');">基・セ</button>
              <input type="text" class="input_w1" value="0" name="p_diecutter_jump_sewingmachine_ks" id="p_diecutter_jump_sewingmachine_ks">
            </div>
          </div>

          <div class="group">
            <div class="inputgroup">
              <span class="spanwidth_12">マイクロミシン</span>
              <label><input type="text" class="form_style input_w2" name="p_diecutter_micro_sewingmachine_hon">本</label>
            </div>
            <div class="inputgroup">
              <label><input type="text" class="form_style input_w2" name="p_diecutter_micro_sewingmachine_dai">台</label>
            </div>
            <div class="inputgroup">
              <span id="p_diecutter_micro_sewingmachine_ks_mark" class="markzone mz_c6 v_hidden"></span>
              <button type="button" class="input_w5" id="p_diecutter_micro_sewingmachine_ks_btn" @click="OnButtonClick('p_diecutter_micro_sewingmachine_ks');">基・セ</button>
              <input type="text" class="input_w1" value="0" name="p_diecutter_micro_sewingmachine_ks" id="p_diecutter_micro_sewingmachine_ks">
            </div>
            <div class="inputgroup">
              <span class="spanwidth_12 mgl40">ジャンプマイクロミシン</span>
              <label><input type="text" class="form_style input_w2" name="p_diecutter_jump_micro_sewingmachine_hon">本</label>
            </div>
            <div class="inputgroup">
              <label><input type="text" class="form_style input_w2" name="p_diecutter_jump_micro_sewingmachine_dai">台</label>
            </div>
            <div class="inputgroup">
              <span id="p_diecutter_jump_micro_sewingmachine_ks_mark" class="markzone mz_c6 v_hidden"></span>
              <button type="button" class="input_w5" id="p_diecutter_jump_micro_sewingmachine_ks_btn" @click="OnButtonClick('p_diecutter_jump_micro_sewingmachine_ks');">基・セ</button>
              <input type="text" class="input_w1" value="0" name="p_diecutter_jump_micro_sewingmachine_ks" id="p_diecutter_jump_micro_sewingmachine_ks">
            </div>
          </div>

          <div class="group">
            <div class="inputgroup">
              <span class="spanwidth_12">穴</span>
              <label><input type="text" class="form_style input_w2" name="p_diecutter_ana_hon">本</label>
            </div>
            <div class="inputgroup">
              <label><input type="text" class="form_style input_w2" name="p_diecutter_ana_dai">台</label>
            </div>
            <div class="inputgroup">
              <span id="p_diecutter_ana_ks_mark" class="markzone mz_c6 v_hidden"></span>
              <button type="button" class="input_w5" id="p_ana_ks_btn" @click="OnButtonClick('p_diecutter_ana_ks');">基・セ</button>
              <input type="text" class="input_w1" value="0" name="p_diecutter_ana_ks" id="p_diecutter_ana_ks">
            </div>
            <div class="inputgroup">
              <span class="spanwidth_12 mgl40">コーナーカット</span>
              <label><input type="text" class="form_style input_w2" name="p_diecutter_cornercut">ヶ所</label>
            </div>
            <div class="inputgroup">
              <label><input type="text" class="form_style input_w2" name="p_diecutter_cornercut_dai">台</label>
            </div>
            <div class="inputgroup">
              <span id="p_diecutter_cornercut_ks_mark" class="markzone mz_c6 v_hidden"></span>
              <button type="button" class="input_w5" id="p_diecutter_cornercut_ks_btn" @click="OnButtonClick('p_diecutter_cornercut_ks');">基・セ</button>
              <input type="text" class="input_w1" value="0" name="p_diecutter_cornercut_ks" id="p_diecutter_cornercut_ks">
            </div>
          </div>

        </div><!--end area-->
      </div><!--end department01-->


      <div id="department01">
        <div class="cate"><h4 class="lspacing1">外注</h4></div>
        <div class="area">
          <div class="group">
            <div class="inputgroup">
              <button type="button" id="outsource_paper_btn" @click="OutsourcingButton('outsource_paper');">紙だけの外注先</button>
              <input type="text" class="form_style input_w20" value="" name="outsource_paper" id="outsource_paper">
            </div>
            <div class="inputgroup">
              <label>外注費<input type="text" class="form_style input_w5" name="outsource_paper_cost"></label>
            </div>
          </div>

          <div class="group">
            <div class="inputgroup">
              <button type="button" id="outsource_paper_all_btn" @click="OutsourcingButton('outsource_paper_all');">このP全部の外注先</button>
              <input type="text" class="form_style input_w20" value="" name="outsource_paper_all" id="outsource_paper_all">
            </div>
            <div class="inputgroup">
              <label>外注費<input type="text" class="form_style input_w5" name="outsource_paper_all_cost"></label>
            </div>
          </div>

        </div><!--end area-->
      </div><!--end department01-->


      <div class="line flex_jc_c">
        <div class="inputgroup">
          <button type="button" id="p_cancel_btn" @click="cancelClickBtn();">キャンセル</button>
        </div>
        <div class="inputgroup">
          <button type="button" id="p_del_btn" @click="Pdel('p_num');">このPを削除</button>
        </div>
        <div class="inputgroup">
          <span class="mz_tc1"></span><input type="text" class="form_style input_w5" v-bind:value="pageNum + 'P目'" disabled><input type="hidden" name="pagenum" v-bind:value="pageNum">
        </div>
        <div class="inputgroup">
          <span class="mz_tc1"></span><input type="text" class="form_style input_w5" name="pagename" v-bind:value="pageName" disabled><input type="hidden" name="pagename" v-bind:value="pageName">
        </div>
        <div class="inputgroup">
          <button type="button" id="p_set_btn" @click="Pset('p_num');">このPを設定</button>
        </div>
      </div>

    </div><!-- end cnt1 -->

    <div id="area1">
      <div v-if="outsourcingview == true">
        <out-sourcing
          v-bind:input-textid="inputtextid"
          v-on:oscancel-event="OScancel"
          v-on:selectos-event="selectOS"
        ></out-sourcing>
      </div>
    </div>

  </div>
</template>

<script>
//import moment from "moment";
//import { dialogable } from "../mixins/dialogable.js";
//import { checkable } from "../mixins/checkable.js";
//import { requestable } from "../mixins/requestable.js";
export default {
  name: 'Parts',
  //mixins: [dialogable, checkable, requestable],
  props: {
    pageNum: {
      type:  Number,
      default: ""
    },
    pageName: {
      type:  String,
      default: ""
    }
  },
  data() {
    return {
      details: [],
      pagename: "",
      outsourcingview: false,

    };
  },
  // マウント時
  mounted() {
    this.Test();
  },
  methods: {
    // -------------------- イベント処理 --------------------
    OnButtonClick(t) {
      var tm = t + '_mark';
      var inputid = document.getElementById(t);
      var inputvalue = inputid.value;
      var targetid = document.getElementById(tm);
      if (inputvalue == "1") { 
        targetid.style.visibility = "hidden";
        inputid.value = "0";
      }
      else if (inputvalue == "0") {
        targetid.style.visibility = "visible";
        inputid.value = "1";
      }
    },
    cancelClickBtn() {
      this.$emit('pcancel-event',event);
      console.log('cancelClickBtn Parts.vue キャンセルボタン押下 = ' + this.pageName);

    },
    OutsourcingButton(t) {
      var tbid = t + '_btn';
      var targetid = document.getElementById(t);
      var viewtaget = document.getElementById('area1');

        var textbox =  document.getElementById('TextArea1');
        var elem = document.getElementById(tbid);
        var rect = elem.getBoundingClientRect();
        var elemtop = rect.top + window.pageYOffset - 40;
        var elemleft = rect.left + window.pageXOffset;
        var elembottom = rect.bottom + window.pageYOffset;
        var elemright = rect.right + window.pageXOffset;
        //textbox.value = 'top:' + elemtop+'\r\n'; 
        //textbox.value += 'left:' + elemleft+'\r\n'; 
        //textbox.value += 'bottom:' + elembottom+'\r\n'; 
        //textbox.value += 'right:' + elemright+'\r\n'; 
      console.log('Button y = ' + elemtop);
      viewtaget.style.position = 'absolute'; 
      viewtaget.style.top = elemtop + 'px';
      //viewtaget.style.left = pageX + 'px';
      viewtaget.style.left = '0px';

      this.inputtextid = t;
      this.outsourcingview = true;
      console.log('OutsourcingButton 引数 = ' + t);

    },
    selectOS(event,param1) {
      var target_inputid = document.getElementById(event);
      target_inputid.value = param1;
      this.outsourcingview = false;
      console.log('Parts.vue selectOS event = ' + event);

    },
    OScancel() {
      this.outsourcingview = false;
      console.log('外注先画面Outsourcing.vue 終了');
    },

    // ------------------------ サーバー処理 ----------------------------
    Test(){
      console.log('Parts.vue 出力')
    }
    // -------------------- 共通 ----------------------------
  }
};
</script>
