<?php

return [

/*
|--------------------------------------------------------------------------
| Líneas de Idioma para Validaciones
|--------------------------------------------------------------------------
|
| Las siguientes líneas de idioma contienen los mensajes de error predeterminados utilizados por
| la clase validadora. Algunas de estas reglas tienen múltiples versiones tales
| como las reglas de tamaño. Siéntete libre de ajustar cada uno de estos mensajes aquí.
|
*/

'accepted' => 'El campo :attribute debe ser aceptado.',
'active_url' => 'El campo :attribute no es una URL válida.',
'after' => 'El campo :attribute debe ser una fecha posterior a :date.',
'after_or_equal' => 'El campo :attribute debe ser una fecha posterior o igual a :date.',
'alpha' => 'El campo :attribute solo puede contener letras.',
'alpha_dash' => 'El campo :attribute solo puede contener letras, números, guiones y guiones bajos.',
'alpha_num' => 'El campo :attribute solo puede contener letras y números.',
'array' => 'El campo :attribute debe ser un arreglo.',
'before' => 'El campo :attribute debe ser una fecha anterior a :date.',
'before_or_equal' => 'El campo :attribute debe ser una fecha anterior o igual a :date.',
'between' => [
    'numeric' => 'El campo :attribute debe estar entre :min y :max.',
    'file' => 'El campo :attribute debe tener entre :min y :max kilobytes.',
    'string' => 'El campo :attribute debe tener entre :min y :max caracteres.',
    'array' => 'El campo :attribute debe tener entre :min y :max ítems.',
],
'boolean' => 'El campo :attribute debe ser verdadero o falso.',
'confirmed' => 'La confirmación del campo :attribute no coincide.',
'date' => 'El campo :attribute no es una fecha válida.',
'date_equals' => 'El campo :attribute debe ser una fecha igual a :date.',
'date_format' => 'El campo :attribute no coincide con el formato :format.',
'different' => 'Los campos :attribute y :other deben ser diferentes.',
'digits' => 'El campo :attribute debe tener :digits dígitos.',
'digits_between' => 'El campo :attribute debe tener entre :min y :max dígitos.',
'dimensions' => 'El campo :attribute tiene dimensiones de imagen inválidas.',
'distinct' => 'El campo :attribute tiene un valor duplicado.',
'email' => 'El campo :attribute debe ser una dirección de correo electrónico válida.',
'ends_with' => 'El campo :attribute debe terminar con uno de los siguientes valores: :values.',
'exists' => 'El :attribute seleccionado no es válido.',
'file' => 'El campo :attribute debe ser un archivo.',
'filled' => 'El campo :attribute debe tener un valor.',
'gt' => [
    'numeric' => 'El campo :attribute debe ser mayor que :value.',
    'file' => 'El campo :attribute debe tener más de :value kilobytes.',
    'string' => 'El campo :attribute debe tener más de :value caracteres.',
    'array' => 'El campo :attribute debe tener más de :value ítems.',
],
'gte' => [
    'numeric' => 'El campo :attribute debe ser mayor o igual que :value.',
    'file' => 'El campo :attribute debe ser mayor o igual que :value kilobytes.',
    'string' => 'El campo :attribute debe ser mayor o igual que :value caracteres.',
    'array' => 'El campo :attribute debe tener :value ítems o más.',
],
'image' => 'El campo :attribute debe ser una imagen.',
'in' => 'El :attribute seleccionado no es válido.',
'in_array' => 'El campo :attribute no existe en :other.',
'integer' => 'El campo :attribute debe ser un número entero.',
'ip' => 'El campo :attribute debe ser una dirección IP válida.',
'ipv4' => 'El campo :attribute debe ser una dirección IPv4 válida.',
'ipv6' => 'El campo :attribute debe ser una dirección IPv6 válida.',
'json' => 'El campo :attribute debe ser una cadena JSON válida.',
'lt' => [
    'numeric' => 'El campo :attribute debe ser menor que :value.',
    'file' => 'El campo :attribute debe tener menos de :value kilobytes.',
    'string' => 'El campo :attribute debe tener menos de :value caracteres.',
    'array' => 'El campo :attribute debe tener menos de :value ítems.',
],
'lte' => [
    'numeric' => 'El campo :attribute debe ser menor o igual que :value.',
    'file' => 'El campo :attribute debe ser menor o igual que :value kilobytes.',
    'string' => 'El campo :attribute debe ser menor o igual que :value caracteres.',
    'array' => 'El campo :attribute no debe tener más de :value ítems.',
],
'max' => [
    'numeric' => 'El campo :attribute no debe ser mayor a :max.',
    'file' => 'El campo :attribute no debe ser mayor a :max kilobytes.',
    'string' => 'El campo :attribute no debe ser mayor a :max caracteres.',
    'array' => 'El campo :attribute no debe tener más de :max ítems.',
],
'mimes' => 'El campo :attribute debe ser un archivo de tipo: :values.',
'mimetypes' => 'El campo :attribute debe ser un archivo de tipo: :values.',
'min' => [
    'numeric' => 'El campo :attribute debe ser como mínimo :min.',
    'file' => 'El campo :attribute debe tener como mínimo :min kilobytes.',
    'string' => 'El campo :attribute debe tener como mínimo :min caracteres.',
    'array' => 'El campo :attribute debe tener como mínimo :min ítems.',
],
'not_in' => 'El :attribute seleccionado no es válido.',
'not_regex' => 'El formato del campo :attribute no es válido.',
'numeric' => 'El campo :attribute debe ser un número.',
'password' => 'La contraseña es incorrecta.',
'present' => 'El campo :attribute debe estar presente.',
'regex' => 'El formato del campo :attribute no es válido.',
'required' => 'El campo :attribute es obligatorio.',
'required_if' => 'El campo :attribute es obligatorio cuando :other es :value.',
'required_unless' => 'El campo :attribute es obligatorio a menos que :other esté en :values.',
'required_with' => 'El campo :attribute es obligatorio cuando :values está presente.',
'required_with_all' => 'El campo :attribute es obligatorio cuando :values están presentes.',
'required_without' => 'El campo :attribute es obligatorio cuando :values no está presente.',
'required_without_all' => 'El campo :attribute es obligatorio cuando ninguno de los :values están presentes.',
'same' => 'Los campos :attribute y :other deben coincidir.',
'size' => [
    'numeric' => 'El campo :attribute debe ser :size.',
    'file' => 'El campo :attribute debe ser de :size kilobytes.',
    'string' => 'El campo :attribute debe ser de :size caracteres.',
    'array' => 'El campo :attribute debe contener :size ítems.',
],
'starts_with' => 'El campo :attribute debe empezar con uno de los siguientes valores: :values.',
'string' => 'El campo :attribute debe ser una cadena de texto.',
'timezone' => 'El campo :attribute debe ser una zona válida.',
'unique' => 'El :attribute ya ha sido tomado.',
'uploaded' => 'El :attribute falló al subirse.',
'url' => 'El formato del campo :attribute no es válido.',
'uuid' => 'El campo :attribute debe ser un UUID válido.',

/*
|--------------------------------------------------------------------------
| Líneas de Idioma Personalizadas para Validaciones
|--------------------------------------------------------------------------
|
| Aquí puedes especificar mensajes de validación personalizados para atributos usando
| la convención "attribute.rule" para nombrar las líneas. Esto hace que sea rápido
| especificar un mensaje de idioma específico para una regla de atributo dada.
|
*/

'custom' => [
    'attribute-name' => [
        'rule-name' => 'mensaje-personalizado',
    ],
],

/*
|--------------------------------------------------------------------------
| Atributos de Validación Personalizados
|--------------------------------------------------------------------------
|
| Las siguientes líneas de idioma se utilizan para intercambiar nuestros marcadores de posición de atributos
| con algo más amigable para el lector como "Dirección de Correo Electrónico" en lugar de "email".
| Esto simplemente nos ayuda a hacer nuestro mensaje más expresivo.
|
*/

'attributes' => [],

];
