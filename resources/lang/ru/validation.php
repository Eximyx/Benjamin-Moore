<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    "accepted"=>  "Вы должны принять :attribute.",
  "accepted_if"=>  "Вы должны принять :attribute, когда :other соответствует :value.",
  "active_url"=>  "Значение поля :attribute должно быть действительным URL адресом.",
  "after"=>  "Значение поля :attribute должно быть датой после :date.",
  "after_or_equal"=>  "Значение поля :attribute должно быть датой после или равной :date.",
  "alpha"=>  "Значение поля :attribute может содержать только буквы.",
  "alpha_dash"=>  "Значение поля :attribute может содержать только буквы, цифры, дефис и нижнее подчеркивание.",
  "alpha_num"=>  "Значение поля :attribute может содержать только буквы и цифры.",
  "array"=>  "Значение поля :attribute должно быть массивом.",
  "ascii"=>  "Значение поля :attribute должно содержать только однобайтовые цифро-буквенные символы.",
  "before"=>  "Значение поля :attribute должно быть датой до :date.",
  "before_or_equal"=>  "Значение поля :attribute должно быть датой до или равной :date.",
  "between"=>  [
      "array"=>  "The :attribute field must have between :min and :max items.",
      "file"=>  "The :attribute field must be between :min and :max kilobytes.",
      "numeric"=>  "The :attribute field must be between :min and :max.",
      "string"=>  "The :attribute field must be between :min and :max characters."
  ],
  "boolean"=>  "Значение поля :attribute должно быть логического типа.",
  "can"=>  "Значение поля :attribute должно быть авторизованным.",
  "confirmed"=>  "Значение поля :attribute не совпадает с подтверждаемым.",
  "current_password"=>  "Неверный пароль.",
  "date"=>  "Значение поля :attribute должно быть корректной датой.",
  "date_equals"=>  "Значение поля :attribute должно быть датой равной :date.",
  "date_format"=>  "Значение поля :attribute должно соответствовать формату даты :format.",
  "decimal"=>  "Значение поля :attribute должно содержать :decimal цифр десятичных разрядов.",
  "declined"=>  "Поле :attribute должно быть отклонено.",
  "declined_if"=>  "Поле :attribute должно быть отклонено, когда :other равно :value.",
  "different"=>  "Значения полей :attribute и :other должны различаться.",
  "digits"=>  "Количество символов в поле :attribute должно быть равным :digits.",
  "digits_between"=>  "Количество символов в поле :attribute должно быть между :min и :max.",
  "dimensions"=>  "Изображение, указанное в поле :attribute, имеет недопустимые размеры.",
  "distinct"=>  "Значения поля :attribute не должны повторяться.",
  "doesnt_end_with"=>  "Значение поля :attribute не должно заканчиваться одним из следующих: :values.",
  "doesnt_start_with"=>  "Значение поля :attribute не должно начинаться с одного из следующих: :values.",
  "email"=>  "Значение поля :attribute должно быть действительным электронным адресом.",
  "ends_with"=>  "Значение поля :attribute должно заканчиваться одним из следующих: :values",
  "enum"=>  "Значение поля :attribute некорректно.",
  "exists"=>  "Значение поля :attribute не существует.",
  "extensions"=>  "Файл в поле :attribute должен иметь одно из следующих расширений: :values.",
  "file"=>  "В поле :attribute должен быть указан файл.",
  "filled"=>  "Значение поля :attribute обязательно для заполнения.",
  "gt"=>  [
      "array"=>  "The :attribute field must have more than :value items.",
      "file"=>  "The :attribute field must be greater than :value kilobytes.",
      "numeric"=>  "The :attribute field must be greater than :value.",
      "string"=>  "The :attribute field must be greater than :value characters."
  ],
  "gte"=>  [
      "array"=>  "The :attribute field must have :value items or more.",
      "file"=>  "The :attribute field must be greater than or equal to :value kilobytes.",
      "numeric"=>  "The :attribute field must be greater than or equal to :value.",
      "string"=>  "The :attribute field must be greater than or equal to :value characters."
  ],
  "hex_color"=>  "Значение поля :attribute должно быть корректным цветом в HEX формате.",
  "image"=>  "Файл, указанный в поле :attribute, должен быть изображением.",
  "in"=>  "Значение поля :attribute некорректно.",
  "in_array"=>  "Значение поля :attribute должно присутствовать в :other.",
  "integer"=>  "Значение поля :attribute должно быть целым числом.",
  "ip"=>  "Значение поля :attribute должно быть действительным IP-адресом.",
  "ipv4"=>  "Значение поля :attribute должно быть действительным IPv4-адресом.",
  "ipv6"=>  "Значение поля :attribute должно быть действительным IPv6-адресом.",
  "json"=>  "Значение поля :attribute должно быть JSON строкой.",
  "lowercase"=>  "Значение поля :attribute должно быть в нижнем регистре.",
  "lt"=>  [
      "array"=>  "The :attribute field must have less than :value items.",
      "file"=>  "The :attribute field must be less than :value kilobytes.",
      "numeric"=>  "The :attribute field must be less than :value.",
      "string"=>  "The :attribute field must be less than :value characters."
  ],
  "lte"=>  [
      "array"=>  "The :attribute field must not have more than :value items.",
      "file"=>  "The :attribute field must be less than or equal to :value kilobytes.",
      "numeric"=>  "The :attribute field must be less than or equal to :value.",
      "string"=>  "The :attribute field must be less than or equal to :value characters."
  ],
  "mac_address"=>  "Значение поля :attribute должно быть корректным MAC-адресом.",
  "max"=>  [
      "array"=>  "The :attribute field must not have more than :max items.",
      "file"=>  "The :attribute field must not be greater than :max kilobytes.",
      "numeric"=>  "The :attribute field must not be greater than :max.",
      "string"=>  "The :attribute field must not be greater than :max characters."
  ],
  "max_digits"=>  "Значение поля :attribute не должно содержать больше :max цифр.",
  "mimes"=>  "Файл, указанный в поле :attribute, должен быть одного из следующих типов: :values.",
  "mimetypes"=>  "Файл, указанный в поле :attribute, должен быть одного из следующих типов: :values.",
  "min"=>  [
      "array"=>  "The :attribute field must have at least :min items.",
      "file"=>  "The :attribute field must be at least :min kilobytes.",
      "numeric"=>  "The :attribute field must be at least :min.",
      "string"=>  "The :attribute field must be at least :min characters."
  ],
  "min_digits"=>  "Значение поля :attribute должно содержать не меньше :min цифр.",
  "missing"=>  "Значение поля :attribute должно отсутствовать.",
  "missing_if"=>  "Значение поля :attribute должно отсутствовать, когда :other равно :value.",
  "missing_unless"=>  "Значение поля :attribute должно отсутствовать, когда :other не равно :value.",
  "missing_with"=>  "Значение поля :attribute должно отсутствовать, если :values указано.",
  "missing_with_all"=>  "Значение поля :attribute должно отсутствовать, когда указаны все :values.",
  "multiple_of"=>  "Значение поля :attribute должно быть кратным :value",
  "not_in"=>  "Значение поля :attribute некорректно.",
  "not_regex"=>  "Значение поля :attribute имеет некорректный формат.",
  "numeric"=>  "Значение поля :attribute должно быть числом.",
  "password"=>  "Некорректный пароль.",
  "present"=>  "Значение поля :attribute должно быть.",
  "present_if"=>  "Значение поля :attribute должно быть когда :other равно :value.",
  "present_unless"=>  "Значение поля :attribute должно быть, если только :other не равно :value.",
  "present_with"=>  "Значение поля :attribute должно быть когда одно из :values присутствуют.",
  "present_with_all"=>  "Значение поля :attribute должно быть когда все из значений присутствуют: :values.",
  "prohibited"=>  "Значение поля :attribute запрещено.",
  "prohibited_if"=>  "Значение поля :attribute запрещено, когда :other равно :value.",
  "prohibited_unless"=>  "Значение поля :attribute запрещено, если :other не состоит в :values.",
  "prohibits"=>  "Значение поля :attribute запрещает присутствие :other.",
  "regex"=>  "Значение поля :attribute имеет некорректный формат.",
  "required"=>  "Поле :attribute обязательно.",
  "required_array_keys"=>  "Массив в поле :attribute обязательно должен иметь ключи: :values",
  "required_if"=>  "Поле :attribute обязательно для заполнения, когда :other равно :value.",
  "required_if_accepted"=>  "Поле :attribute обязательно, когда :other принято.",
  "required_unless"=>  "Поле :attribute обязательно для заполнения, когда :other не равно :values.",
  "required_with"=>  "Поле :attribute обязательно для заполнения, когда :values указано.",
  "required_with_all"=>  "Поле :attribute обязательно для заполнения, когда :values указано.",
  "required_without"=>  "Поле :attribute обязательно для заполнения, когда :values не указано.",
  "required_without_all"=>  "Поле :attribute обязательно для заполнения, когда ни одно из :values не указано.",
  "same"=>  "Значения полей :attribute и :other должны совпадать.",
  "size"=>  [
      "array"=>  "The :attribute field must contain :size items.",
      "file"=>  "The :attribute field must be :size kilobytes.",
      "numeric"=>  "The :attribute field must be :size.",
      "string"=>  "The :attribute field must be :size characters."
  ],
  "starts_with"=>  "Поле :attribute должно начинаться с одного из следующих значений: :values",
  "string"=>  "Значение поля :attribute должно быть строкой.",
  "timezone"=>  "Значение поля :attribute должно быть действительным часовым поясом.",
  "unique"=>  "Такое значение поля :attribute уже существует.",
  "uploaded"=>  "Загрузка файла из поля :attribute не удалась.",
  "uppercase"=>  "Значение поля :attribute должно быть в верхнем регистре.",
  "url"=>  "Значение поля :attribute имеет ошибочный формат URL.",
  "ulid"=>  "Значение поля :attribute должно быть корректным ULID.",
  "uuid"=>  "Значение поля :attribute должно быть корректным UUID.",

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
