<?php

return [

    'custom' => [

        'email' =>
            [
                'required'     => 'Enter your E-mail',
                'email'  	   => 'This field must be a valid E-mail address',
                'unique' 	   => 'This E-mail is already registered in the system.'
            ],

        'name' =>
            [
                'required'     => 'Enter your name',
                'min'  		   => 'Name must have at least: min characters'
            ],

        'message' =>
            [
                'required'     => 'Enter your message...',
                'min'  		   => 'Message must contain at least: min characters'
            ],

        'nationality' =>
            [
                'required' 	   => 'Choose a nationality',
                'exists'	   => 'Choose a nationality',
            ],

        'firstname' =>
            [
                'required'     => 'Enter your name',
                'min'  		   => 'Name must have at least: min characters'
            ],

        'lastname' =>
            [
                'required'     => 'Enter Surname',
                'min'  		   => 'Last name must have at least: min characters'
            ],

        'firstname_en' =>
            [
                'required'     => 'Enter Name (eng.)',
                'min'  		   => 'Name (eng.) Must have at least: min characters'
            ],

        'lastname_en' =>
            [
                'required'     => 'Enter Last Name (eng.)',
                'min'  		   => 'Last Name (eng.) Must have at least: min characters'
            ],

        'sex' =>
            [
                'required'     	 => 'Choose your gender',
                'integer'     	 => 'Choose your gender',
                'between'     	 => 'Choose your gender'
            ],

        'country' =>
            [
                'required' 	   => 'Choose country of birth',
                'exists'	   => 'Choose country of birth',
            ],

        'birthday' =>
            [
                'required'     	 => 'Choose your birthday',
                'integer'		 => 'Choose your birthday',
                'between'		 => 'Choose your birthday',
            ],

        'birthmonth' =>
            [
                'required'     	 => 'Choose the month of your birth',
                'integer'		 => 'Choose the month of your birth',
                'between'		 => 'Choose the month of your birth',
            ],

        'birthyear' =>
            [
                'required'     	 => 'Choose the year of your birth',
                'integer'		 => 'Choose the year of your birth',
                'between'		 => 'Choose the year of your birth',

            ],

        'document_id' =>
            [
                'required'     	 => 'Select ID Document Type',
                'exists'     	 => 'Select ID Document Type',


            ],

        'document' =>
            [
                'required'     	 => 'Enter your ID document number'
            ],

        'dateday' =>
            [
                'required'     	 => 'Select the day of issuing your ID document',
                'integer'		 => 'Select the day of issuing your ID document',
                'between'		 => 'Select the day of issuing your ID document',
            ],

        'datemonth' =>
            [
                'required'     	 => 'Select the month of issuing your ID document',
                'integer'		 => 'Select the month of issuing your ID document',
                'between'		 => 'Select the month of issuing your ID document',
            ],

        'dateyear' =>
            [
                'required'     	 => 'Select the year of issue of your ID document',
                'integer'		 => 'Select the year of issue of your ID document',
                'between'		 => 'Select the year of issue of your ID document',
            ],


        'phone' =>

            [
                'required'     	 => 'Enter your phone number',
                'regex'			 => 'Your phone number must be in the format: +0123456789'
            ],

        'login' =>
            [
                'required'     => 'Enter login',
                'min'  		   => 'Login must have at least: min characters',
                'unique' 	   => 'This login is already registered in the system'
            ],

        'password' =>
            [
                'required'     => 'Enter password',
                'min'  		   => 'Password must have at least: min characters'
            ],

        'confirm' =>
            [
                'required'           => 'Conform password',
                'not_conformity'     => 'Passwords not conformity'
            ],
    ],

    'accepted'             => 'The :attribute must be accepted.',
    'active_url'           => 'The :attribute is not a valid URL.',
    'after'                => 'The :attribute must be a date after :date.',
    'after_or_equal'       => 'The :attribute must be a date after or equal to :date.',
    'alpha'                => 'The :attribute may only contain letters.',
    'alpha_dash'           => 'The :attribute may only contain letters, numbers, and dashes.',
    'alpha_num'            => 'The :attribute may only contain letters and numbers.',
    'array'                => 'The :attribute must be an array.',
    'before'               => 'The :attribute must be a date before :date.',
    'before_or_equal'      => 'The :attribute must be a date before or equal to :date.',
    'between'              => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file'    => 'The :attribute must be between :min and :max kilobytes.',
        'string'  => 'The :attribute must be between :min and :max characters.',
        'array'   => 'The :attribute must have between :min and :max items.',
    ],
    'boolean'              => 'The :attribute field must be true or false.',
    'confirmed'            => 'The :attribute confirmation does not match.',
    'date'                 => 'The :attribute is not a valid date.',
    'date_format'          => 'The :attribute does not match the format :format.',
    'different'            => 'The :attribute and :other must be different.',
    'digits'               => 'The :attribute must be :digits digits.',
    'digits_between'       => 'The :attribute must be between :min and :max digits.',
    'dimensions'           => 'The :attribute has invalid image dimensions.',
    'distinct'             => 'The :attribute field has a duplicate value.',
    'email'                => 'The :attribute must be a valid email address.',
    'exists'               => 'The selected :attribute is invalid.',
    'file'                 => 'The :attribute must be a file.',
    'filled'               => 'The :attribute field must have a value.',
    'gt'                   => [
        'numeric' => 'The :attribute must be greater than :value.',
        'file'    => 'The :attribute must be greater than :value kilobytes.',
        'string'  => 'The :attribute must be greater than :value characters.',
        'array'   => 'The :attribute must have more than :value items.',
    ],
    'gte'                  => [
        'numeric' => 'The :attribute must be greater than or equal :value.',
        'file'    => 'The :attribute must be greater than or equal :value kilobytes.',
        'string'  => 'The :attribute must be greater than or equal :value characters.',
        'array'   => 'The :attribute must have :value items or more.',
    ],
    'image'                => 'The :attribute must be an image.',
    'in'                   => 'The selected :attribute is invalid.',
    'in_array'             => 'The :attribute field does not exist in :other.',
    'integer'              => 'The :attribute must be an integer.',
    'ip'                   => 'The :attribute must be a valid IP address.',
    'ipv4'                 => 'The :attribute must be a valid IPv4 address.',
    'ipv6'                 => 'The :attribute must be a valid IPv6 address.',
    'json'                 => 'The :attribute must be a valid JSON string.',
    'lt'                   => [
        'numeric' => 'The :attribute must be less than :value.',
        'file'    => 'The :attribute must be less than :value kilobytes.',
        'string'  => 'The :attribute must be less than :value characters.',
        'array'   => 'The :attribute must have less than :value items.',
    ],
    'lte'                  => [
        'numeric' => 'The :attribute must be less than or equal :value.',
        'file'    => 'The :attribute must be less than or equal :value kilobytes.',
        'string'  => 'The :attribute must be less than or equal :value characters.',
        'array'   => 'The :attribute must not have more than :value items.',
    ],
    'max'                  => [
        'numeric' => 'The :attribute may not be greater than :max.',
        'file'    => 'The :attribute may not be greater than :max kilobytes.',
        'string'  => 'The :attribute may not be greater than :max characters.',
        'array'   => 'The :attribute may not have more than :max items.',
    ],
    'mimes'                => 'The :attribute must be a file of type: :values.',
    'mimetypes'            => 'The :attribute must be a file of type: :values.',
    'min'                  => [
        'numeric' => 'The :attribute must be at least :min.',
        'file'    => 'The :attribute must be at least :min kilobytes.',
        'string'  => 'The :attribute must be at least :min characters.',
        'array'   => 'The :attribute must have at least :min items.',
    ],
    'not_in'               => 'The selected :attribute is invalid.',
    'not_regex'            => 'The :attribute format is invalid.',
    'numeric'              => 'The :attribute must be a number.',
    'present'              => 'The :attribute field must be present.',
    'regex'                => 'The :attribute format is invalid.',
    'required'             => 'The :attribute field is required.',
    'required_if'          => 'The :attribute field is required when :other is :value.',
    'required_unless'      => 'The :attribute field is required unless :other is in :values.',
    'required_with'        => 'The :attribute field is required when :values is present.',
    'required_with_all'    => 'The :attribute field is required when :values is present.',
    'required_without'     => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same'                 => 'The :attribute and :other must match.',
    'size'                 => [
        'numeric' => 'The :attribute must be :size.',
        'file'    => 'The :attribute must be :size kilobytes.',
        'string'  => 'The :attribute must be :size characters.',
        'array'   => 'The :attribute must contain :size items.',
    ],
    'string'               => 'The :attribute must be a string.',
    'timezone'             => 'The :attribute must be a valid zone.',
    'unique'               => 'The :attribute has already been taken.',
    'uploaded'             => 'The :attribute failed to upload.',
    'url'                  => 'The :attribute format is invalid.',


    'attributes' => [],
    'message_subject'      => 'Enter a message subject',
    'success_subscribe'    => 'Thank you for subscribing to our news!',
    'success_contact_title'=> 'Thank You for Message!',
    'success_contact'      => 'Your message has been sent and will be reviewed a soon is passable!',
    'success_signup'	   => 'Profile was created successfully! (page to reload in a few seconds)',
    'empty_user'		   => 'You entered an incorrect username and / or password!',
    'avatar'			   => 'Please upload your photo!'

];
