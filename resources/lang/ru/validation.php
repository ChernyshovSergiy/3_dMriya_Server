<?php 

	return[

	   'custom' => [

	   		'email' =>
				[
					'required'     => 'Введите Ваш E-mail',
					'email'  	   => 'Поле должно быть корректным адресом E-mail',
					'unique' 	   => 'Такой E-mail уже зарегистрирован в системе'
				],

			'name' =>
				[
					'required'     => 'Введите Ваше Имя',
					'min'  		   => 'Имя должен иметь не менее :min символов'
				],

			'message' =>
				[
					'required'     => 'Введите сообщение...',
					'min'  		   => 'В сообщении должно быть не менее :min символов'
				],

			'nationality' =>
				[
					'required' 	   => 'Выберите национальность',
					'exists'	   => 'Выберите национальность', 
				],			

			'firstname' =>
				[
					'required'     => 'Введите Имя',
					'min'  		   => 'Имя должно иметь не менее :min символов'
				],

			'lastname' =>
				[
					'required'     => 'Введите Фамилию',
					'min'  		   => 'Фамилия должна иметь не менее :min символов'
				],

			'firstname_en' =>
				[
					'required'     => 'Введите Имя (анг.)',
					'min'  		   => 'Имя (анг.) должно иметь не менее :min символов'
				],

			'lastname_en' =>
				[
					'required'     => 'Введите Фамилию (анг.)',
					'min'  		   => 'Фамилия (анг.) должна иметь не менее :min символов'
				],

			'sex' =>
				[
					'required'     	 => 'Выберите свой пол',
					'integer'     	 => 'Выберите свой пол',
					'between'     	 => 'Выберите свой пол'
				],

			'country' =>
				[
					'required' 	   => 'Выберите страну рождения',
					'exists'	   => 'Выберите страну рождения', 
				],	

			'birthday' =>
				[
					'required'     	 => 'Выберите день Вашего рождения',
					'integer'		 => 'Выберите день Вашего рождения',
					'between'		 => 'Выберите день Вашего рождения',
				],

			'birthmonth' =>
				[
					'required'     	 => 'Выберите месяц Вашего рождения',
					'integer'		 => 'Выберите месяц Вашего рождения',
					'between'		 => 'Выберите месяц Вашего рождения',
				],

			'birthyear' => 
				[
					'required'     	 => 'Выберите год Вашего рождения',
					'integer'		 => 'Выберите год Вашего рождения',
					'between'		 => 'Выберите год Вашего рождения',

				],			

			'document_id' =>
				[
					'required'     	 => 'Выберите тип Документа',
					'exists'     	 => 'Выберите тип Документа',


				],			

			'document' =>
				[
					'required'     	 => 'Введите номер  Вашего документа'
				],

			'dateday' =>
				[
					'required'     	 => 'Выберите день выдачи Вашего документа',
					'integer'		 => 'Выберите день выдачи Вашего документа',
					'between'		 => 'Выберите день выдачи Вашего документа',
				],

			'datemonth' =>
				[
					'required'     	 => 'Выберите месяц выдачи Вашего документа',
					'integer'		 => 'Выберите месяц выдачи Вашего документа',
					'between'		 => 'Выберите месяц выдачи Вашего документа',
				],

			'dateyear' => 
				[
					'required'     	 => 'Выберите год выдачи Вашего документа',
					'integer'		 => 'Выберите год выдачи Вашего документа',
					'between'		 => 'Выберите год выдачи Вашего документа',
				],	


			'phone' => 

				[
					'required'     	 => 'Введите Ваш номер телефона',
					'regex'			 => 'Ваш номер телефона должен быть в формате +0123456789'
				],

			'login' =>
				[
					'required'     => 'Введите Логин',
					'min'  		   => 'Логин должен иметь не менее :min символов',
					'unique' 	   => 'Такой логин уже зарегистрирован в системе'
				],

			'password' =>
				[
					'required'     => 'Введите пароль',
					'min'  		   => 'Пароль должен иметь не менее :min символов'
				],
			
			'confirm' =>
				[
					'required'           => 'Введите пароль еще раз',
					'not_conformity'     => 'Пароли не совпадают'
				],


    ],
            'message_subject'      => 'Введите тему сообщения',
			'success_subscribe'    => 'Благодарим за подписку на наши новости!',
            'success_contact_title'=> 'Спасибо за Ваше сообщение!',
			'success_contact'      => 'Ваше сообщение было отправлено и будет просмотрено в ближайшее время!',
			'success_signup'	   => 'Профиль был успешно создан! ( страница перезагрузиться за несколько секунд ) ',
			'empty_user'		   => 'Вы ввели неверный логин и/или пароль!',
			'avatar'			   => 'Загрузите, пожалуйста свою фотографию!' 

			];