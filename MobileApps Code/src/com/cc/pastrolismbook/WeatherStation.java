package com.cc.pastrolismbook;


import java.util.ArrayList;

import org.json.JSONArray;
import org.json.JSONObject;

import android.app.Activity;
import android.app.ProgressDialog;
import android.content.Context;
import android.net.ConnectivityManager;
import android.net.NetworkInfo;
import android.os.AsyncTask;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.AdapterView;
import android.widget.AdapterView.OnItemSelectedListener;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.Spinner;
import android.widget.TextView;
import android.widget.Toast;

public class WeatherStation extends Activity {
	boolean connected;
	//String url, weather;
	String url,  date, time, temperature, humidity, rain, wind_speed, barometric_presser, wind_direction ;
	
	
	int success;
	String message;
	
	JSONObject jsonObj;

	Spinner spinner1; 	// to load tower city and location
	Button submit_; 	// to submit selected tower id
	TextView output_humidity; 	// to show weather data weather TextView
	TextView output_temperature;
	TextView output_rain;
	
	ArrayList<String> 	spinner1_list 	= new ArrayList<String>();
	ArrayList<Integer> 	spinner1_id 	= new ArrayList<Integer>();
	int selectedspinner1;
	
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_weather_station);
		
		spinner1 = (Spinner) findViewById(R.id.spinner_1);
		spinner1.setOnItemSelectedListener(new OnItemSelectedListener() {

			@Override
			public void onItemSelected(AdapterView<?> parentView, View selectedItemView,
				int position, long id) {
				selectedspinner1 = spinner1_id.get(spinner1.getSelectedItemPosition());
				//Toast.makeText(getApplicationContext(), spinner1.getSelectedItem().toString(), Toast.LENGTH_LONG).show();
			}

			@Override
			public void onNothingSelected(AdapterView<?> arg0) {}
		});	
		
		output_humidity = (TextView) findViewById(R.id.humidity);
		output_humidity.setText("Humidity Data");
		
		
		output_rain = (TextView) findViewById(R.id.rain);
		output_rain.setText("rain Data");
		
		output_temperature=(TextView) findViewById(R.id.temperature);
		output_temperature.setText("Temerature Data");
		
		submit_ = (Button) findViewById(R.id.submit_btn);
		submit_.setOnClickListener(new OnClickListener() {
			
			@Override
			public void onClick(View v) {
				new spin2_AsyncTaskRunner().execute();				
			}
		});
		
		
		
		
		
		
		checkIConnection();
		if(connected)
			new spin1_AsyncTaskRunner().execute();
	}
	
	public void checkIConnection(){
		ConnectivityManager connectivityManager = (ConnectivityManager)getSystemService(Context.CONNECTIVITY_SERVICE);
	    if(connectivityManager.getNetworkInfo(ConnectivityManager.TYPE_MOBILE).getState() == NetworkInfo.State.CONNECTED || 
	            connectivityManager.getNetworkInfo(ConnectivityManager.TYPE_WIFI).getState() == NetworkInfo.State.CONNECTED) {
	        connected = true;
	        Toast.makeText(getApplicationContext(), "Connected", Toast.LENGTH_LONG).show();
	    }else{
	        connected = false;
	        Toast.makeText(getApplicationContext(), "No internet connection available", Toast.LENGTH_LONG).show();
	    }
	}
	
	class spin1_AsyncTaskRunner extends AsyncTask<String, String, String>{
		ProgressDialog progressDialog = new ProgressDialog(WeatherStation.this);

		protected void onPreExecute(){
			progressDialog.setMessage("Please wait...");
			progressDialog.setCancelable(false);
			progressDialog.show();
		}

		@Override
		protected String doInBackground(String... params) {
			try{
				url = "http://felnabazar.com/towers/?tower";  //url for all tower
				jsonObj = JSONsimple.getJSONfromURL(url);
				
				spinner1_list.clear();
				spinner1_id.clear();
				
				success = jsonObj.optInt("success");
				message = jsonObj.optString("message");
				
				if(success == 1){
					JSONArray spins = jsonObj.getJSONArray("records");
					for(int i = 0; i < spins.length(); i++){
						JSONObject spin = spins.getJSONObject(i);
						
						spinner1_list.add(spin.optString("tower"));
						spinner1_id.add(spin.optInt("id"));
					}
				}
			}catch(Exception e){
				Log.d("Error:", e+"");
			}
			return null;
		}

		protected void onPostExecute(String string){
			Toast.makeText(getApplicationContext(), message, Toast.LENGTH_LONG).show();
			
			if(success == 1){
				spinner1.setAdapter(new ArrayAdapter<String>(WeatherStation.this,
						android.R.layout.simple_spinner_dropdown_item,
						spinner1_list));
				selectedspinner1 = spinner1_id.get(0);
			}else{
				Toast.makeText(getApplicationContext(), message, Toast.LENGTH_LONG).show();
			}		
					
			progressDialog.dismiss();
		}
	}
	
	class spin2_AsyncTaskRunner extends AsyncTask<String, String, String>{
		ProgressDialog progressDialog = new ProgressDialog(WeatherStation.this);

		protected void onPreExecute(){
			progressDialog.setMessage("Please wait...");
			progressDialog.setCancelable(false);
			progressDialog.show();
		}

		@Override
		protected String doInBackground(String... params) {
			try{
				url = "http://felnabazar.com/towers/?tower_id="+selectedspinner1; //url for pick a tower
				jsonObj = JSONsimple.getJSONfromURL(url);
				
				
				
			}catch(Exception e){
				Log.d("Error:", e+"");
			}
			return null;
		}

		protected void onPostExecute(String string){
			//display database to TextView

			success = jsonObj.optInt("success");
			message = jsonObj.optString("message");
		
			try{
			if(success != 0){
				JSONArray spins = jsonObj.getJSONArray("records");
				JSONObject spin = spins.getJSONObject(0);
				//store value of weather in
				humidity = spin.optString("humidity");
				temperature=spin.optString("temperature");
				rain=spin.optString("rain");

				output_humidity.setText(humidity+" "+ temperature+" "+rain);
				
				
				output_temperature.setText(temperature);

				output_rain.setText(rain);

				
			}
			}catch(Exception e){
				
			}
			if(success == 0){
				Toast.makeText(getApplicationContext(), message, Toast.LENGTH_LONG).show();
			}
			progressDialog.dismiss();
		}
	}
}