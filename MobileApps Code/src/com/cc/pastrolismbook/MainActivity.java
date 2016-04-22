package com.cc.pastrolismbook;



import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.os.CountDownTimer;
import android.view.Menu;
import android.view.Window;
import android.view.WindowManager;

public class MainActivity extends Activity {

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        
        /** Hiding Title bar of this activity screen */
        getWindow().requestFeature(Window.FEATURE_NO_TITLE);
        
        /** Making this activity, full screen */
        getWindow().setFlags(WindowManager.LayoutParams.FLAG_FULLSCREEN, 
                WindowManager.LayoutParams.FLAG_FULLSCREEN);
        
        /** Sets a layout for this activity */
        setContentView(R.layout.activity_main);
        
        /** Creates a count down timer, which will be expired after 5000 milliseconds */         
        new CountDownTimer(2000,1000) {        	
        	
        	/** This method will be invoked on finishing or expiring the timer */
			@Override
			public void onFinish() {
				/** Creates an intent to start new activity */
				Intent intent = new Intent(getBaseContext(), HomeActivity.class);
				
				/** Creates a new activity, on finishing this timer */
				startActivity(intent);
				
				/** Close this activity screen */
				finish();
				
			}

			/** This method will be invoked in every 1000 milli seconds until 
			* this timer is expired.Because we specified 1000 as tick time 
			* while creating this CountDownTimer
			*/
			@Override
			public void onTick(long millisUntilFinished) {
								
			}
		}.start();
        
    }

    
    
    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        getMenuInflater().inflate(R.menu.main, menu);
        return true;

		
	

	}

}
