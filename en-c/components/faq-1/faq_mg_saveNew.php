<?

function faq_mg_saveNew(){
	
	dbs( 'faq', ['name','text','flag'=>1] );

}

