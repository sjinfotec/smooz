<?php

return [

    'IDENTIFICATION_ID' => [
      'import' => 'G001',
      'customer_category' => 'C001'
    ],

    'G001' => [
      'copy' => 1,
      'deploy' => 2,
      'distribute' => 3
    ],

    'G001_WORD' => [
      'copy' => 'shell_import',
      'deploy' => 'deploy_import',
      'distribute' => 'quotations_import',
      'unknown' => 'unknown'
    ],

    'STATUS' => [
      'start' => 1,
      'restart' => 2,
      'failed' => 8,
      'end' => 9,
    ],

    'HOST_INFO' => [
      'scp_smooth' => 'root@192.168.0.2'
    ],

    'FILE_PATH' => [
      'path_smooth_dat' => '/home/httpd/data/3jyoDB/',
      'path_smooth_dest' => '/var/www/html/laravel/storage/app/public/',
      'path_sh_smooth' => '/var/www/html/laravel/public/sh/',
      'path_app_log' => '/var/www/html/laravel/storage/logs/'
    ],

    'FILE_NAME' => [
      'file_mitumoridat_dat' => 'Mitumori.DAT',
      'file_tokmst_dat' => 'TOKmst.DAT',
      'file_papnam_dat' => 'PapNam.DAT',
      'file_gaimst_dat' => 'GAImst.DAT',
      'file_industry_dat' => 'Industry.DAT',
      'file_mittag_idx' => 'MitTag.IDX',
      'file_sh_smooth' => 'mit_im.sh'
    ],

    'FILE_ITEMCNT' => [
      'file_mittag_idx' => 3,
      'file_tokmst_dat' => 33,
      'file_gaimst_dat' => 3,
      'file_industry_dat' => 3,
      'file_papnam_dat' => 14
    ],

    'TARGET_TABLE' => [
      'customers' => 'customers',
      'customer_converts' => 'customer_converts',
      'industrys' => 'industrys',
      'imp_mitumori_dat' => 'imp_mitumori_dat',
      'wrk_quotations' => 'wrk_quotations',
      'wrk_quotations_binding' => 'wrk_quotations_binding',
      'wrk_quotations_cost' => 'wrk_quotations_cost',
      'wrk_quotations_department' => 'wrk_quotations_department',
      'wrk_quotations_parts' => 'wrk_quotations_parts',
      'quotations' => 'quotations',
      'quotations_binding' => 'quotations_binding',
      'quotations_cost' => 'quotations_cost',
      'quotations_department' => 'quotations_department',
      'quotations_parts' => 'quotations_parts',
      'quotations_tag_index' => 'quotations_tag_index'
    ],

    'SMOOTH_RECID' => [
      'dummy' => '00',
      'parts01' => '01',
      'parts02' => '02',
      'parts03' => '03',
      'parts04' => '04',
      'parts05' => '05',
      'parts06' => '06',
      'parts07' => '07',
      'parts08' => '08',
      'parts09' => '09',
      'parts10' => '10',
      'parts11' => '11',
      'parts12' => '12',
      'parts13' => '13',
      'parts14' => '14',
      'parts15' => '15',
      'tail' => '99'
    ],
 
    'RESPONCE_ITEM' => [
      'messagedata' => 'messagedata',
      'message' => 'message'
    ],

    'MSG_ERROR' => [
      'failed_import_mitumoridat' => 'スムーズの見積DATimportに失敗',
      'failed_max_error' => '最大値取得エラー',
      'failed_backuplog_error' => 'backupエラー'
    ],

    'LOG_MSG' => [
      'failed_shell' => 'Failed.... smooth shell {0}',
      'data_select_error' => 'error.... select {0}',
      'data_insert_error' => 'error.... insert {0}'
    ],

    // 旧スムース配列位置（見積）
    //   共通
    'MITUMORI_DAT_POS_COMMON' => [
      'user_code' => 0,
      'm_code' => 1,
      'rec_id' => 2,
      'dummy1' => 3,
      'dummy_record' => 4,
      'dummy2' => 5,
      'dummy3' => 6,
      'dummy4' => 7,
      'dummy5' => 8,
      'dummy6' => 9,
      'dummy7' => 10,
      'dummy8' => 11,
      'dummy9' => 12,
      'dummy10' => 13,
      'dummy11' => 14,
      'dummy12' => 15,
      'dummy13' => 16,
      'dummy14' => 17,
      'dummy15' => 18,
      'dummy16' => 19,
      'dummy17' => 20,
      'dummy18' => 21,
      'dummy19' => 22
    ],
    //   rec_id = 00 :hdr
    'MITUMORI_DAT_POS_00' => [
      'user_code' => 0,
      'm_code' => 1,
      'rec_id' => 2,
      'refrencd_m_code' => 3,
      'create_date' => 4,
      'lastorder_date' => 5,
      'number_order' => 6,
      'manager_code' => 7,
      'manager' => 8,
      'customer_code' => 9,
      'customer' => 10,
      'enduser' => 11,
      'product' => 12,
      'dummy1' => 13,
      'production_setnum' => 14,
      'production_setnum_unit' => 15,
      'production_volnum' => 16,
      'production_volnum_unit' => 17,
      'dummy2' => 18,
      'production_all' => 19,
      'unit' => 20,
      'cylinder' => 21,
      'cylinder_num' => 22,
      'cylinder_set' => 23,
      'inch_fold' => 24,
      'dummy3' => 25,
      'parts_num' => 26,
      'all_through' => 27,
      'markflg_table' => 28,
      'model_pullout_mark' => 29,
      'model_pullout_outsourcing' => 30,
      'model_pullout_outsourcing_cost' => 31,
      'kasutori' => 32,
      'kasutori_outsou' => 33,
      'kasutori_outsou_cost' => 34,
      'nisu_single' => 35,
      'nisu_through' => 36,
      'tsr_times' => 37,
      'tsr_through' => 38,
      'form_color_change' => 39,
      'form_carbon_mold' => 40,
      'form_all_outsou' => 41,
      'form_all_outsou_cost' => 42,
      'form_subtotal' => 43,
      'offset_color_change' => 44,
      'offset_carbon_mold' => 45,
      'offset_subtotal' => 46,
      'block_copy' => 47,
      'kinds' => 48,
      'difficulty' => 49,
      'plate_making_outsou' => 50,
      'plate_making_outsou_cost' => 51,
      'dummy3' => 52,
      'ctp' => 53,
      'inkjet' => 54,
      'inkjet_sheet' => 55,
      'ondemand_color_front' => 56,
      'ondemand_color_back' => 57,
      'ondemand_through_front' => 58,
      'ondemand_through_back' => 59,
      'plate_subtotal' => 60,
      'collator' => 61,
      'bebe' => 62,
      'tape_process' => 63,
      'collator_cno' => 64,
      'collator_ana' => 65,
      'collator_all_outsou' => 66,
      'collator_all_outsou_cost' => 67,
      'collator_subtotal' => 68,
      'collator_basic_fee' => 69,
      'sheetcut' => 70
    ],
    //   rec_id = 99 :tail
    'MITUMORI_DAT_POS_99' => [
      'user_code' => 0,
      'm_code' => 1,
      'rec_id' => 2,
      'dummy1' => 3,
      'dummy2' => 4,
      'nl_color' => 5,
      'nl_hagaki' => 6,
      'nl_hagaki_color' => 7,
      'nl_envelope_color' => 8,
      'nl_number_part' => 9,
      'nl_subtotal' => 10,
      'sei_time' => 11,
      'sei_chouai' => 12,
      'sei_chouai_outsou' => 13,
      'sei_chouai_outsou_cost' => 14,
      'sei_dansai' => 15,
      'sei_dansai_outsou' => 16,
      'sei_dansai_outsou_cost' => 17,
      'sei_marble' => 18,
      'sei_cross' => 18,
      'sei_mat_maki_cardboard' => 18,
      'sei_mat_cardboard' => 18,
      'sei_nori' => 19,
      'sei_tsuduri' => 20,
      'sei_kurumi' => 21,
      'sei_buster' => 21,
      'sei_crimping' => 21,
      'sei_laminate' => 22,
      'sei_laminate_through' => 23,
      'sei_musen_tozi' => 24,
      'sei_musen_tozi_outsou' => 25,
      'sei_musen_tozi_outsou_cost' => 26,
      'sei_naka_tozi' => 27,
      'sei_naka_tozi_outsou' => 27,
      'sei_naka_tozi_outsou_cost' => 28,
      'sei_sashikomi' => 29,
      'sei_sashikomi_outsou' => 30,
      'sei_sashikomi_outsou_cost' => 31,
      'sei_ana' => 32,
      'sei_part' => 33,
      'sei_donko' => 34,
      'sei_ori_w' => 35,
      'sei_ori_h' => 36,
      'sei_obi' => 37,
      'sei_bara' => 38,
      'sei_oneset' => 39,
      'sei_obake' => 40,
      'sei_otoshi' => 0,
      'sei_otoshi_part' => 0,
      'sei_package' => 41,
      'sei_package_num' => 42,
      'sei_box' => 43,
      'sei_box_num' => 44,
      'sei_a_system' => 45,
      'sei_c_system' => 45,
      'sei_vinyl' => 45,
      'sei_all_outsou' => 46,
      'sei_all_outsou_cost' => 47,
      'sei_subtotal' => 48,
      'send_city' => 49,
      'send_in_dou' => 50,
      'send_out_dou' => 51,
      'send_out_dou_yen' => 52,
      'send_all' => 53,
      'send_subtotal' => 54,
      'inside_hand_work' => 55,
      'inside_insourcing_cost' => 56,
      'outside_job1' => 57,
      'outside_job1_outsou' => 58,
      'outside_job1_outsou_cost' => 59,
      'outside_job2' => 60,
      'outside_job2_outsou' => 61,
      'outside_job2_outsou_cost' => 62,
      'outside_subtotal' => 63,
      'addition_cost1' => 64,
      'addition_cost1_buy' => 65,
      'addition_cost2' => 66,
      'addition_cost2_buy' => 67,
      'addition_cost3' => 68,
      'addition_cost3_buy' => 69,
      'addition_cost4' => 70,
      'addition_cost4_buy' => 71,
      'addition_cost5' => 72,
      'addition_cost5_buy' => 73,
      'addition_subtotal' => 74,
      'product_all_outsou1' => 75,
      'product_all_outsou1_cost' => 76,
      'product_all_outsou2' => 77,
      'product_all_outsou2_cost' => 78,
      'product_all_outsou3' => 79,
      'product_all_outsou3_cost' => 80,
      'product_all_subtotal' => 81,
      'paper_amount' => 82,
      'wages_amount' => 83,
      'cost_amount' => 84,
      'estimate_amount' => 85,
      'comment' => 86,
      'dummy3' => 87
    ],

    // 旧スムース項目長
    //   rec_id = 01-15
    'MITUMORI_DAT_LEN_PARTS' => [
      'user_code' => 0,
      'm_code' => 1,
      'rec_id' => 2,
      'paper_code' => 3,								// 用紙コード
      'paper_name' => 4,								// 用紙名
      'p_supply' => 5,								// 支給受けマーク
      'size_w' => 6,							// サイズ横
      'size_h' => 7,							// サイズ縦
      'size_top' => 8,							// サイズ分子
      'size_bottom' => 9,						// サイズ分母
      'papertray' => 10,							// 紙取
      'imposition_w' => 11,						// 面付け横
      'imposition_h' => 12,						// 面付け縦
      'p_color_front' => 13,						// 色数表
      'p_color_back' => 14,						// 色数裏
      'p_desensitization' => 15,					// 減感
      'p_carbon' => 15,							// カーボン
      'p_white' => 15,							// ホワイト
      'p_separate' => 15,						// セパレート
      'p_through' => 16,							// 通し数
      'p_sheet' => 17,							// 実質・ｍ／枚・数
      'p_mm_apply' => 18,						// 巻・丸め摘要単位Ｍ数
      'p_mm_dispose' => 19,						// 巻・丸め処置後のＭ数
      'p_mm_unit' => 20,							// 巻・丸め品目ｍ単価
      'p_printing_cost' => 23,					// 印刷原価
      'p_necessary_sheet' => 24,					// 総必要　枚数orＭ数
      'p_paper_price' => 25,						// 用紙代金
      'p_form_sewingmachine_w' => 26,			// ミシン横
      'p_form_sewingmachine_h' => 27,			// ミシン縦
      'p_form_jump_sewingmachine_w' => 28,		// ジャンプミシン横
      'p_form_jump_sewingmachine_h' => 29,		// ジャンプミシン縦
      'p_form_micro_sewingmachine_w' => 30,		// マイクロミシン横
      'p_form_micro_sewingmachine_h' => 31,		// マイクロミシン縦
      'p_form_jump_micro_sewingmachine_w' => 32, 	// ジャンプマイクロミシン横
      'p_form_jump_micro_sewingmachine_h' => 33,	  // ジャンプマイクロミシン縦
      'p_form_linein_w' => 34,					// スジ入れ横
      'p_form_linein_h' => 35,					// スジ入れ縦
      'p_form_slitter_w' => 36,					// スリッター横
      'p_form_slitter_h' => 37,					// スリッター縦
      'p_form_no' => 38,							// No.
      'p_form_sewingmachine_ks' => 39,						// ミシン基・セ
      'p_form_jump_sewingmachine_ks' => 39,					// ジャンプミシン基・セ
      'p_form_micro_sewingmachine_ks' => 39,					// マイクロミシン基・セ
      'p_form_jump_micro_sewingmachine_ks' => 39,					// ジャンプマイクロミシン基・セ
      'p_form_linein_ks' => 39,					// スジ入れ基・セ
      'p_form_slitter_ks' => 39,					// スリッター基・セ
      'p_form_no_ks' => 39,					// No.基・セ
      'p_form_subtotal' => 40,					// フォーム部工賃小計
      'p_offset_sewingmachine_w' => 41,			// ミシン
      'p_offset_no' => 42,						// No.
      'p_offset_sewingmachine_ks' => 43,					// ミシン基・セ
      'p_offset_no_ks' => 43,					// 基・セ
      'p_offset_subtotal' => 44,					// オフセット部工賃小計
      'p_letterpress_sewingmachine_hon' => 45,	  // ミシン本
      'p_letterpress_sewingmachine_dai' => 46,	  // ミシン台
      'p_letterpress_jump_sewingmachine_hon' => 47,  // ジャンプミシン本
      'p_letterpress_jump_sewingmachine_dai' => 48,  // ジャンプミシン台
      'p_letterpress_micro_sewingmachine_hon' => 49,   // マイクロミシン本
      'p_letterpress_micro_sewingmachine_dai' => 50,   // マイクロミシン台
      'p_letterpress_jump_micro_sewingmachine_hon' => 51,     // ジャンプマイクロミシン本
      'p_letterpress_jump_micro_sewingmachine_dai' => 52,  // ジャンプマイクロミシン台
      'p_letterpress_linein_hon' => 53,			// スジ入れ本
      'p_letterpress_linein_dai' => 54,			// スジ入れ台
      'p_letterpress_slitter_hon' => 55,			// スリッター本
      'p_letterpress_slitter_dai' => 56,			// スリッター台
      'p_letterpress_diecut' => 57,				// 型ヌキ
      'p_letterpress_pcno' => 58,				// 親子No.
      'p_letterpress_no' => 59,					// No.
      'p_letterpress_sewingmachine_ks' => 60,				// ミシン基・セ
      'p_letterpress_jump_sewingmachine_ks' => 60,				// ジャンプミシン基・セ
      'p_letterpress_micro_sewingmachine_ks' => 60,				// マイクロミシン基・セ
      'p_letterpress_jump_micro_sewingmachine_ks' => 60,				// ジャンプマイクロミシン基・セ
      'p_letterpress_linein_ks' => 60,				// スジ入れ基・セ
      'p_letterpress_slitter_ks' => 60,				// スリッター基・セ
      'p_letterpress_diecut_ks' => 60,				// 型ヌキ基・セ
      'p_letterpress_pcno_ks' => 60,				// 親子No.基・セ
      'p_letterpress_no_ks' => 60,				// No.基・セ
      'p_letterpress_subtotal' => 61,			// 活版部工賃小計
      'p_info_toray' => 62,						// 東レ
      'p_info_ijp' => 62,						// フォーム ＩＪＰ
      'p_info_dot_line' => 63,					// ドットライン
      'p_info_dot_dai' => 64,					// ドット台
      'p_info_basic_fee' => 65,					// 基本料金
      'p_info_output' => 66,						// 宛名等出力件数
      'p_info_punching' => 67,					// パンチング
      'p_info_subtotal' => 68,					// 情報処理工賃小計
      'p_diecutter_sewingmachine_hon' => 69,		// ミシン本
      'p_diecutter_sewingmachine_dai' => 70,		// ミシン台
      'p_diecutter_jump_sewingmachine_hon' => 71,    // ジャンプミシン本
      'p_diecutter_jump_sewingmachine_dai' => 72,    // ジャンプミシン台
      'p_diecutter_micro_sewingmachine_hon' => 73,   // マイクロミシン本
      'p_diecutter_micro_sewingmachine_dai' => 74,   // マイクロミシン台
      'p_diecutter_jump_micro_sewingmachine_hon' => 75, 	// ジャンプマイクロミシン本
      'p_diecutter_jump_micro_sewingmachine_dai' => 76, 	// ジャンプマイクロミシン台
      'p_diecutter_ana_hon' => 77,				// 穴本
      'p_diecutter_ana_dai' => 78,				// 穴台
      'p_diecutter_cornercut' => 79,				// コーナーカットヶ所
      'p_diecutter_cornercut_dai' => 80,			// コーナーカット台
      'p_diecutter_sewingmachine_ks' => 81,			// ミシン基・セ
      'p_diecutter_jump_sewingmachine_ks' => 81,			// ジャンプミシン基・セ
      'p_diecutter_micro_sewingmachine_ks' => 81,			// マイクロミシン基・セ
      'p_diecutter_jump_micro_sewingmachine_ks' => 81,			// ジャンプマイクロミシン基・セ
      'p_diecutter_ana_ks' => 81,			// 穴基・セ
      'p_diecutter_cornercut_ks' => 81,			// コーナーカット基・セ
      'p_diecutter_subtotal' => 82,				// ダイカッタ工賃小計
      'outsource_paper' => 83,					// 紙の外注先
      'outsource_paper_cost' => 84,				//  紙の外注金額
      'outsource_paper_all' => 85,				//  全体の外注先
      'outsource_paper_all_cost' => 86,			//  全体の外注金額
      'p_form_cornercut' => 87,			//  フォーム・コーナーカット
      'p_form_replace' => 88,			//  フォーム・差し替えｎ種
      'p_form_replace_color' => 89,			//  フォーム・差し替えカラー
      'p_envelope' => 90			//  封筒加工加算マーク
    ],

    //   見積tag
    'MITUMORI_TAG_POS_PARTS' => [
      'code' => 0,
      'pos' => 1
    ],

    // 旧スムース配列位置（マスタ）
    //   得意先マスタ
    'TOKMST_DAT_POS_CUSTOMERS' => [
      'code' => 0,
      'name' => 1,
      'post' => 2,
      'address1' => 3,
      'address2' => 4,
      'tel' => 5,
      'fax' => 6,
      'charge' => 7,
      'cutoff' => 8,
      'collection' => 9,
      'tax_class' => 10,
      'tax_fraction' => 11,
      'industry' => 12,
      'created_date' => 13,
      'created_time' => 14,
      'dummy1' => 15,
      'code_2' => 16,
      'name_2' => 17,
      'post_2' => 18,
      'address1_2' => 19,
      'address2_2' => 20,
      'tel_2' => 21,
      'fax_2' => 22,
      'charge_2' => 23,
      'cutoff_2' => 24,
      'collection_2' => 25,
      'tax_class_2' => 26,
      'tax_fraction_2' => 27,
      'industry_2' => 28,
      'created_date_2' => 29,
      'created_time_2' => 30,
      'dummy2' => 31,
      'dummy3' => 32
    ],

    // 旧スムース配列位置（マスタ）
    //   外注先マスタ
    'GAIMST_DAT_POS_CUSTOMERS' => [
      'code' => 0,
      'name' => 1
    ],

    //   業種マスタ
    'INDUSTRY_DAT_POS_INDUSTRYS' => [
      'code' => 0,
      'name' => 1
    ],

    //   用紙マスタ
    'PAPNUM_DAT_POS_PAPERCOSTS' => [
      'code' => 0,
      'name' => 1,
      'name_display' => 2,
      'standard' => 3,
      'color' => 4,
      'mater_unit_price' => 5,
      'pack_internal_number' => 6,
      'unit_price_1' => 7,
      'unit_price_24' => 8,
      'unit_price_49' => 9,
      'unit_price_99' => 10,
      'unit_price_124' => 11,
      'unit_price_249' => 12,
      'unit_price_499' => 13
    ],

    'C001' => [
      'customer_tokuisaki' => 1,
      'customer_ippan' => 2,
      'customer_gaichusaki' => 3,
      'customer_syanai' => 4
    ]
];
