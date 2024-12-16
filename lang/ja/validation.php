<?php

declare(strict_types=1);

return [
    'accepted'             => ':Attributeを承認してください。',
    'accepted_if'          => ':Otherが:valueの場合、:attributeを承認する必要があります。',
    'active_url'           => ':Attributeは、有効なURLではありません。',
    'after'                => ':Attributeには、:dateより後の日付を指定してください。',
    'after_or_equal'       => ':Attributeには、:date以降の日付を指定してください。',
    'alpha'                => ':Attributeには、アルファベッドのみ使用できます。',
    'alpha_dash'           => ':Attributeには、英数字(\'A-Z\',\'a-z\',\'0-9\')とハイフンと下線(\'-\',\'_\')が使用できます。',
    'alpha_num'            => ':Attributeには、英数字(\'A-Z\',\'a-z\',\'0-9\')が使用できます。',
    'array'                => ':Attributeには、配列を指定してください。',
    'ascii'                => ':Attributeには、英数字と記号のみ使用可能です。',
    'before'               => ':Attributeには、:dateより前の日付を指定してください。',
    'before_or_equal'      => ':Attributeには、:date以前の日付を指定してください。',
    'between'              => [
        'array'   => ':Attributeの項目は、:min個から:max個にしてください。',
        'file'    => ':Attributeには、:min KBから:max KBまでのサイズのファイルを指定してください。',
        'numeric' => ':Attributeには、:minから、:maxまでの数字を指定してください。',
        'string'  => ':Attributeは、:min文字から:max文字にしてください。',
    ],
    'boolean'              => ':Attributeには、\'true\'か\'false\'を指定してください。',
    'can'                  => ':Attributeに権限のない値が含まれています。',
    'confirmed'            => ':Attributeと:attribute確認が一致しません。',
    'current_password'     => 'パスワードが正しくありません。',
    'date'                 => ':Attributeは、正しい日付ではありません。',
    'date_equals'          => ':Attributeは:dateと同じ日付を入力してください。',
    'date_format'          => ':Attributeの形式が\':format\'と一致しません。',
    'decimal'              => ':Attributeは、小数点以下が:decimalである必要があります。',
    'declined'             => ':Attributeを拒否する必要があります。',
    'declined_if'          => ':Otherが:valueの場合、:attributeを拒否する必要があります。',
    'different'            => ':Attributeと:otherには、異なるものを指定してください。',
    'digits'               => ':Attributeは、:digits桁にしてください。',
    'digits_between'       => ':Attributeは、:min桁から:max桁にしてください。',
    'dimensions'           => ':Attributeの画像サイズが無効です',
    'distinct'             => ':Attributeの値が重複しています。',
    'doesnt_end_with'      => ':Attributeの終わりは「:values」以外である必要があります。',
    'doesnt_start_with'    => ':Attributeの始まりは「:values」以外である必要があります。',
    'email'                => ':Attributeは、有効なメールアドレス形式で指定してください。',
    'ends_with'            => ':Attributeの終わりは「:values」である必要があります。',
    'enum'                 => '選択した :attributeは 無効です。',
    'exists'               => '選択された:attributeは、有効ではありません。',
    'extensions'           => ':attribute には、次のいずれかの拡張子が必要です: :values',
    'file'                 => ':Attributeには、ファイル形式を指定してください。',
    'filled'               => ':Attributeは必須です。',
    'gt'                   => [
        'array'   => ':Attributeの項目数は、:value個より多い必要があります。',
        'file'    => ':Attributeは、:value KBより大きい必要があります。',
        'numeric' => ':Attributeは、:valueより大きい必要があります。',
        'string'  => ':Attributeは、:value文字を超える必要があります。',
    ],
    'gte'                  => [
        'array'   => ':Attributeの項目数は、:value個以上である必要があります。',
        'file'    => ':Attributeは、:value KB以上である必要があります。',
        'numeric' => ':Attributeは、:value以上である必要があります。',
        'string'  => ':Attributeは、:value文字以上である必要があります。',
    ],
    'hex_color'            => ':attributeは、有効な16進数カラーコードを指定してください。',
    'image'                => ':Attributeには、画像を指定してください。',
    'in'                   => '選択された:attributeは、有効ではありません。',
    'in_array'             => ':Attributeが:otherに存在しません。',
    'integer'              => ':Attributeには、整数を指定してください。',
    'ip'                   => ':Attributeには、有効なIPアドレスを指定してください。',
    'ipv4'                 => ':AttributeはIPv4アドレスを指定してください。',
    'ipv6'                 => ':AttributeはIPv6アドレスを指定してください。',
    'json'                 => ':Attributeには、有効なJSON文字列を指定してください。',
    'lowercase'            => ':Attributeは、小文字で入力してください。',
    'lt'                   => [
        'array'   => ':Attributeの項目数は、:value個より少ない必要があります。',
        'file'    => ':Attributeは、:value KBより小さい必要があります。',
        'numeric' => ':Attributeは、:valueより小さい必要があります。',
        'string'  => ':Attributeは、:value文字より小さい必要があります。',
    ],
    'lte'                  => [
        'array'   => ':Attributeの項目数は、:value個以下である必要があります。',
        'file'    => ':Attributeは、:value KB以下である必要があります。',
        'numeric' => ':Attributeは、:value以下である必要があります。',
        'string'  => ':Attributeは、:value文字以下である必要があります。',
    ],
    'mac_address'          => ':Attributeは有効なMACアドレスである必要があります。',
    'max'                  => [
        'array'   => ':Attributeの項目数は、:max個以下である必要があります。',
        'file'    => ':Attributeは、:max KB以下のファイルである必要があります。',
        'numeric' => ':Attributeは、:max以下の数字である必要があります。',
        'string'  => ':Attributeの文字数は、:max文字以下である必要があります。',
    ],
    'max_digits'           => ':Attributeは、:max桁以下の数字である必要があります。',
    'mimes'                => ':Attributeには、以下のファイルタイプを指定してください。:values',
    'mimetypes'            => ':Attributeには、以下のファイルタイプを指定してください。:values',
    'min'                  => [
        'array'   => ':Attributeの項目数は、:min個以上にしてください。',
        'file'    => ':Attributeには、:min KB以上のファイルを指定してください。',
        'numeric' => ':Attributeには、:min以上の数字を指定してください。',
        'string'  => ':Attributeの文字数は、:min文字以上である必要があります。',
    ],
    'min_digits'           => ':Attributeは、:min桁以上の数字である必要があります。',
    'missing'              => ':Attribute を入力する必要はありません。',
    'missing_if'           => ':Other が :value の場合、:attribute を入力する必要はありません。',
    'missing_unless'       => ':Other が :value でない限り、:attribute をは入力する必要はありません。',
    'missing_with'         => ':Values が存在する場合、:attribute をは入力する必要はありません。',
    'missing_with_all'     => ':Values が存在する場合、:attribute をは入力する必要はありません。',
    'multiple_of'          => ':Attributeは:valueの倍数である必要があります',
    'not_in'               => '選択された:attributeは、有効ではありません。',
    'not_regex'            => ':Attributeの形式が正しくありません。',
    'numeric'              => ':Attributeには、数字を指定してください。',
    'password'             => [
        'letters'       => ':Attributeは文字を1文字以上含める必要があります。',
        'mixed'         => ':Attributeは大文字と小文字をそれぞれ1文字以上含める必要があります。',
        'numbers'       => ':Attributeは数字を1文字以上含める必要があります。',
        'symbols'       => ':Attributeは記号を1文字以上含める必要があります。',
        'uncompromised' => ':Attributeは情報漏洩した可能性があります。他の:attributeを選択してください。',
    ],
    'present'              => ':Attributeが存在している必要があります。',
    'present_if'           => ':other が :value の場合、:Attributeが存在する必要があります。',
    'present_unless'       => ':other が :value でない限り、:Attributeが存在する必要があります。',
    'present_with'         => ':values が存在する場合は、:Attributeも存在する必要があります。',
    'present_with_all'     => ':values が存在する場合は、:Attributeが存在する必要があります。',
    'prohibited'           => ':Attributeの入力は禁止されています。',
    'prohibited_if'        => ':Otherが:valueの場合は、:Attributeの入力が禁止されています。',
    'prohibited_unless'    => ':Otherが:valuesでない限り、:Attributeの入力は禁止されています。',
    'prohibits'            => ':Otherが存在している場合、:Attributeの入力は禁止されています。',
    'regex'                => ':Attributeには、正しい形式を指定してください。',
    'required'             => ':Attributeは必須項目です。',
    'required_array_keys'  => ':Attributeには、:valuesのエントリを含める必要があります。',
    'required_if'          => ':Otherが:valueの場合、:attributeを指定してください。',
    'required_if_accepted' => ':Otherを承認した場合、:attributeは必須項目です。',
    'required_unless'      => ':Otherが:values以外の場合、:attributeは必須項目です。',
    'required_with'        => ':Valuesが入力されている場合、:attributeは必須項目です。',
    'required_with_all'    => ':Valuesが全て指定されている場合、:attributeは必須項目です。',
    'required_without'     => ':Valuesが入力されていない場合、:attributeは必須項目です。',
    'required_without_all' => ':Valuesが全て指定されていない場合、:attributeを指定してください。',
    'same'                 => ':Attributeと:otherが一致しません。',
    'size'                 => [
        'array'   => ':Attributeの項目数は、:size個にしてください。',
        'file'    => ':Attributeには、:size KBのファイルを指定してください。',
        'numeric' => ':Attributeには、:sizeを指定してください。',
        'string'  => ':Attributeの文字数は、:size文字にしてください。',
    ],
    'starts_with'          => ':Attributeは、次のいずれかで始まる必要があります。:values',
    'string'               => ':Attributeには、文字列を指定してください。',
    'timezone'             => ':Attributeには、有効なタイムゾーンを指定してください。',
    'ulid'                 => ':Attributeは、有効なULIDである必要があります。',
    'unique'               => '指定の:attributeは既に使用されています。',
    'uploaded'             => ':Attributeのアップロードに失敗しました。',
    'uppercase'            => ':Attributeは、大文字で入力してください。',
    'url'                  => ':Attributeは、有効なURL形式で指定してください。',
    'uuid'                 => ':Attributeは、有効なUUIDである必要があります。',
    'attributes'           => [
        'address'                  => '住所',
        'affiliate_url'            => 'アフィリエイトURL',
        'age'                      => '年',
        'amount'                   => '額',
        'announcement'             => '発表',
        'area'                     => 'エリア',
        'audience_prize'           => '観客賞',
        'audience_winner'          => 'audience winner',
        'available'                => '利用可能',
        'birthday'                 => '誕生日',
        'body'                     => '本文',
        'city'                     => '市',
        'company'                  => 'company',
        'compilation'              => '編集',
        'concept'                  => 'コンセプト',
        'conditions'               => '条件',
        'content'                  => 'コンテンツ',
        'contest'                  => 'contest',
        'country'                  => '国',
        'cover'                    => 'カバー',
        'created_at'               => '作成日',
        'creator'                  => 'クリエーター',
        'currency'                 => '通貨',
        'current_password'         => '現在のパスワード',
        'customer'                 => 'お客様',
        'date'                     => '日付',
        'date_of_birth'            => '生年月日',
        'dates'                    => '日付',
        'day'                      => '日',
        'deleted_at'               => '削除日',
        'description'              => '説明',
        'display_type'             => '画面タイプ',
        'district'                 => '地区',
        'duration'                 => '期間',
        'email'                    => 'eメール',
        'excerpt'                  => '抜粋',
        'filter'                   => 'フィルタ',
        'finished_at'              => 'に終了しました',
        'first_name'               => '名',
        'gender'                   => '性別',
        'grand_prize'              => '大賞',
        'group'                    => 'グループ',
        'hour'                     => '時間',
        'image'                    => '画像',
        'image_desktop'            => 'デスクトップイメージ',
        'image_main'               => 'メイン画像',
        'image_mobile'             => 'モバイル画像',
        'images'                   => '画像',
        'is_audience_winner'       => '視聴者の勝者です',
        'is_hidden'                => '隠されています',
        'is_subscribed'            => '購読されています',
        'is_visible'               => '見える',
        'is_winner'                => '勝者です',
        'items'                    => 'アイテム',
        'key'                      => '鍵',
        'last_name'                => '姓',
        'lesson'                   => 'レッスン',
        'line_address_1'           => '住所1行目',
        'line_address_2'           => '住所2行目',
        'login'                    => 'ログイン',
        'message'                  => 'メッセージ',
        'middle_name'              => 'ミドルネーム',
        'minute'                   => '分',
        'mobile'                   => 'モバイル',
        'month'                    => '月',
        'name'                     => '名前',
        'national_code'            => '国コード',
        'number'                   => '番号',
        'password'                 => 'パスワード',
        'password_confirmation'    => 'パスワードの確認',
        'phone'                    => '電話番号',
        'photo'                    => '写真',
        'portfolio'                => 'ポートフォリオ',
        'postal_code'              => '郵便番号',
        'preview'                  => 'プレビュー',
        'price'                    => '価格',
        'product_id'               => '製品番号',
        'product_uid'              => '製品UID',
        'product_uuid'             => '製品UUID',
        'promo_code'               => 'プロモーションコード',
        'province'                 => '都道府県',
        'quantity'                 => '量',
        'reason'                   => '理由',
        'recaptcha_response_field' => 'reCAPTCHAの応答',
        'referee'                  => '審判',
        'referees'                 => '審判員',
        'reject_reason'            => '拒否理由',
        'remember'                 => 'ログイン状態を保持',
        'restored_at'              => '復元日',
        'result_text_under_image'  => '画像の下の結果テキスト',
        'role'                     => '権限',
        'rule'                     => 'ルール',
        'rules'                    => 'ルール',
        'second'                   => '秒',
        'sex'                      => '性別',
        'shipment'                 => '発送',
        'short_text'               => '短いテキスト',
        'size'                     => 'サイズ',
        'skills'                   => 'スキル',
        'slug'                     => 'スラッグ',
        'specialization'           => '専門化',
        'started_at'               => 'に始まりました',
        'state'                    => '状態',
        'status'                   => '状態',
        'street'                   => '町名・番地',
        'student'                  => '生徒',
        'subject'                  => '課題',
        'tag'                      => 'タグ',
        'tags'                     => 'タグ',
        'teacher'                  => '先生',
        'terms'                    => '利用規約',
        'test_description'         => 'テスト内容',
        'test_locale'              => 'テストロケール',
        'test_name'                => 'テスト名',
        'text'                     => 'テキスト',
        'time'                     => '時間',
        'title'                    => 'タイトル',
        'type'                     => 'タイプ',
        'updated_at'               => '更新日',
        'user'                     => 'ユーザー',
        'username'                 => 'ユーザー名',
        'value'                    => '値',
        'winner'                   => 'winner',
        'work'                     => 'work',
        'year'                     => '年',

        'location'                 => '作業場所',
        'workDescription'         => '作業内容',
        'machine'                  => '使用機械',
        'fuel'                     => '使用燃料',
    ],
];
