<?php 


Route::group(['prefix' => 'admin','middleware'=>'admin','namespace'=>'Web'], function () {	
	Route::group(['prefix'=>'dashboard'],function(){
		Route::get('dashboard',['as'=>'admin.dashboard','uses'=>'DashboardController@index']);
		
	});	
	Route::group(['prefix'=>'question'],function(){
		Route::get('list/id',['as'=>'admin.question.list','uses'=>'QuestionController@listQuestion']);
		Route::get('create',['as'=>'admin.question.create','uses'=>'QuestionController@getCreate']);
		Route::post('create',['as'=>'admin.question.postcreate','uses'=>'QuestionController@postCreate']);
		
		Route::get('delete',['as'=>'admin.question.delete','uses'=>'QuestionController@deleteQuestion']);
		Route::get('update',['as'=>'admin.question.update','uses'=>'QuestionController@updateQuestion']);
		Route::post('update',['as'=>'admin.question.postupdate','uses'=>'QuestionController@postUpdate']);
	});	

	Route::group(['prefix'=>'competition'],function(){
		Route::get('list',['as'=>'admin.competition.list','uses'=>'CompetitionController@listCompetition']);
		Route::get('create',['as'=>'admin.competition.create','uses'=>'CompetitionController@getCreate']);
		Route::post('create',['as'=>'admin.competition.postcreate','uses'=>'CompetitionController@postCreate']);
		
		Route::get('delete',['as'=>'admin.competition.delete','uses'=>'CompetitionController@deleteCompetition']);
		Route::get('update',['as'=>'admin.competition.update','uses'=>'CompetitionController@updateCompetition']);
		Route::post('update',['as'=>'admin.competition.postupdate','uses'=>'CompetitionController@postUpdate']);

		Route::post('pendding',['as'=>'admin.competition.pendding','uses'=>'CompetitionController@penddingCompetition']);
	});

	Route::group(['prefix'=>'result'],function(){
		Route::get('list',['as'=>'admin.result.list','uses'=>'ResultController@listResult']);
		
		Route::get('delete',['as'=>'admin.result.delete','uses'=>'ResultController@deleteResult']);

		Route::post('pendding',['as'=>'admin.result.pendding','uses'=>'ResultController@penddingResult']);
	});	
	
	Route::group(['prefix'=>'user'],function(){
		Route::get('list',['as'=>'admin.user.list','uses'=>'UserController@listUser']);
		Route::get('delete',['as'=>'admin.user.delete','uses'=>'UserController@deleteUser']);

		Route::post('pendding',['as'=>'admin.user.pendding','uses'=>'UserController@penddingUser']);		
	});

	/*
	manager trophy
	 */	
	Route::group(['prefix'=>'trophy'],function(){
		Route::get('list',['as'=>'admin.trophy.list','uses'=>'TrophyController@listTrophy']);
		Route::get('delete',['as'=>'admin.trophy.delete','uses'=>'TrophyController@deleteTrophy']);

		Route::get('create',['as'=>'admin.trophy.create','uses'=>'TrophyController@getCreate']);
		Route::post('create',['as'=>'admin.trophy.postcreate','uses'=>'TrophyController@postCreate']);

		Route::get('update',['as'=>'admin.trophy.update','uses'=>'TrophyController@updateTrophy']);
		Route::post('update',['as'=>'admin.trophy.postupdate','uses'=>'TrophyController@postUpdate']);

	});	

	/*
	manager feedback
	 */	
	Route::group(['prefix'=>'feedback'],function(){
		Route::get('list',['as'=>'admin.feedback.list','uses'=>'FeedbackController@listFeedback']);
		Route::get('delete',['as'=>'admin.feedback.delete','uses'=>'FeedbackController@deleteFeedback']);		
	});	

	/*
	manager level
	 */	
	Route::group(['prefix'=>'level'],function(){
		Route::get('list',['as'=>'admin.level.list','uses'=>'LevelController@listLevel']);
		Route::get('delete',['as'=>'admin.level.delete','uses'=>'LevelController@deleteLevel']);

		Route::get('create',['as'=>'admin.level.create','uses'=>'LevelController@getCreate']);
		Route::post('create',['as'=>'admin.level.postcreate','uses'=>'LevelController@postCreate']);

		Route::get('update',['as'=>'admin.level.update','uses'=>'LevelController@updateLevel']);
		Route::post('update',['as'=>'admin.level.postupdate','uses'=>'LevelController@postUpdate']);

	});	


	Route::group(['prefix'=>'manager'],function(){
		Route::get('list',['as'=>'admin.manager.list','uses'=>'ManagerController@getList']);
		Route::get('delete',['as'=>'admin.manager.delete','uses'=>'ManagerController@deleteManager']);
		/*
		create manager question
		 */
		Route::get('create',['as'=>'admin.manager.create','uses'=>'ManagerController@getCreate']);
		Route::post('create',['as'=>'admin.manager.postcreate','uses'=>'ManagerController@postCreate']);
	});
	Route::group(['prefix'=>'notification'],function(){
		Route::get('list',['as'=>'admin.notification.list','uses'=>'NotificationController@getList']);
		Route::get('delete',['as'=>'admin.notification.delete','uses'=>'NotificationController@deleteNotification']);

		/*
		Create notification
		 */
		Route::get('create',['as'=>'admin.notification.create','uses'=>'NotificationController@getCreate']);
		Route::post('create',['as'=>'admin.notification.postcreate','uses'=>'NotificationController@postCreate']);
	});
	
});