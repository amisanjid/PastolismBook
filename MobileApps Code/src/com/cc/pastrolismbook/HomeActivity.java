package com.cc.pastrolismbook;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.Button;

public class HomeActivity extends Activity {

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_home);


		Button weather_btn=(Button) findViewById(R.id.weather_station);
				weather_btn.setOnClickListener(new OnClickListener() {
					
					@Override
					public void onClick(View arg0) {
						// TODO Auto-generated method stub
						
						Intent i=new Intent(HomeActivity.this, WeatherStation.class);
						startActivity(i);
						
					}
				});
		
	}

}
