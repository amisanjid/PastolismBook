// BISMILLAH                                    -      +

 short int temp=0;
 short int LSB=0;
 short int MSB=0;

 int pm=0,left=0,mid=0,right=0;
 int rL=0,rm=0,rr=0;
 int rh=0,rain=0;
 int raingo=0;



 void kodomtoli(short int LLSB,short int MMSB)
 {
  short int leadmatchine=0;
  short int x=0,y=0,xx=0,yy=0;
  leadmatchine=MMSB;
  leadmatchine=leadmatchine>>7;

                               if(leadmatchine==0)       // see temp is +
                               {
                                x=LLSB>>4;
                                x=x & 0b00001111;
                                y=MMSB<<4;
                                y=y & 0b11110000;
                                temp=0;
                                temp=temp | x;
                                temp=temp | y;

                                pm=43;    //decimal 43 = char +


                               }
                               else                    // otherwise temp is -
                               {
                                xx=~LLSB;
                                yy=~MMSB;
                                x=xx>>4;
                                x=x & 0b00001111;
                                y=yy<<4;
                                y=y & 0b11110000;
                                temp=0;
                                temp=temp | x;
                                temp=temp | y;

                                pm=45;  // decimal 45= char -
                               }
 }
 void rdisplay(short int rh)
 {

  int a=rh;
  rl=a/100;
  rl=rl+48;
  //lcd_chr(2,3,left);

  rm=(a%100)/10;
  rm=rm+48;
  //lcd_chr(2,4,mid);

  rr=(a%100)%10;
  rr=rr+48;
  //lcd_chr(2,5,right);
 }
 void raindisplay(short int rainn)
 {
  int c= rainn;
  raingo=rainn+48;
  
 }

 void display(short int temperature)
 {

  int a=temperature;
  left=a/100;
  left=left+48;
  //lcd_chr(2,3,left);

  mid=(a%100)/10;
  mid=mid+48;
  //lcd_chr(2,4,mid);

  right=(a%100)%10;
  right=right+48;
  //lcd_chr(2,5,right);
 }
  void gettmp()
 {
      ow_reset(&portd,2);           // reset
      ow_write(&portd,2,0xCC);      // skip rom
      ow_write(&portd,2,0x44);      // convert T

      ow_reset(&portd,2);           // reset
      ow_write(&portd,2,0xCC);      // skip rom
      ow_write(&portd,2,0xBE);      // read SCRATCHPAD

      LSB=ow_read(&portd,2);
      MSB=ow_read(&portd,2);


      kodomtoli(LSB,MSB);
      display(temp);
      delay_ms(1000);
 }
 void urlvoa()
{

          uart1_write(0x41);     //A
          uart1_write(0x54);     //T
          uart1_write(0x2B);     //+
          uart1_write(0x48);     //H
          uart1_write(0x54);     //T
          uart1_write(0x54);     //T
          uart1_write(0x50);     //P
          uart1_write(0x50);     //P
          uart1_write(0x41);     //A
          uart1_write(0x52);     //R
          uart1_write(0x41);     //A
          uart1_write(0x3D);     //=
          uart1_write(0x22);     //"
          uart1_write(0x55);     //U
          uart1_write(0x52);     //R
          uart1_write(0x4C);     //L
          uart1_write(0x22);     //"
          uart1_write(0x2C);     //,
          uart1_write(0x22);     //"

          uart1_write(0x68);       //h
          uart1_write(0x74);       //t
          uart1_write(0x74);       //t
          uart1_write(0x70);       //p

          uart1_write(0x3A);       //:
          uart1_write(0x2F);       ///
          uart1_write(0x2F);       ///
          uart1_write(0x77);       //w
          uart1_write(0x77);       //w
          uart1_write(0x77);       //w
          uart1_write(0x2E);       //.
          //////////////////////////////////
          
          uart1_write(0x66);     //f
          uart1_write(0x65);     //e
          uart1_write(0x6C);     //l
          uart1_write(0x6E);     //n
          uart1_write(0x61);     //a
          uart1_write(0x62);     //b
          uart1_write(0x61);     //a
          uart1_write(0x7A);     //z
          uart1_write(0x61);     //a
          uart1_write(0x72);     //r
          uart1_write(0x2E);     //.
          uart1_write(0x63);     //c
          uart1_write(0x6F);     //o
          uart1_write(0x6D);     //m
          uart1_write(0x2F);     ///
          uart1_write(0x70);     //p
          uart1_write(0x62);     //b
          uart1_write(0x2F);     ///
          uart1_write(0x70);     //p
          uart1_write(0x75);     //u
          uart1_write(0x62);     //b
          uart1_write(0x6C);     //l
          uart1_write(0x69);     //i
          uart1_write(0x63);     //c
          uart1_write(0x2F);     ///
          uart1_write(0x64);     //d
          uart1_write(0x3F);     //?
          uart1_write(0x74);     //t
          uart1_write(0x3D);     //=
          
          uart1_write(pm);         // + - value of temp
          uart1_write(left);        // left data
          uart1_write(mid);         // mid data
          uart1_write(right);       // right data
          
          uart1_write(0x26);      //&
          uart1_write(0x68);      //h
          uart1_write(0x3D);      //=

          uart1_write(rl);                   // left rh
          uart1_write(rm);                   // mid rh
          uart1_write(rr);                   // right rh
          
          uart1_write(0x26);      //&
          uart1_write(0x72);      //r
          uart1_write(0x3D);      //=
          
          uart1_write(raingo);                   //  one data  1  / 0  here
          
          uart1_write(0x26);      //&
          uart1_write(0x77);      //w
          uart1_write(0x73);      //s
          uart1_write(0x3D);      //=
          
   //       uart1_write();                   //  not yet
          
          uart1_write(0x26);      //&
          uart1_write(0x62);      //b
          uart1_write(0x70);      //p
          uart1_write(0x3D);      //=
          
   //       uart1_write();                   // not yet
          
          uart1_write(0x26);      //&
          uart1_write(0x77);      //w
          uart1_write(0x64);      //d
          uart1_write(0x3D);      //=
          
   //       uart1_write();                    // not yet
          
   //       uart1_write();
   //       uart1_write();
          
          /////////////////////////////////

          uart1_write(0x22);      //     "                   testing by turning off " in the end !
          uart1_write(0x0D);
          uart1_write(0x0A);
}

void url()
{

          uart1_write(0x41);     //A
          uart1_write(0x54);     //T
          uart1_write(0x2B);     //+
          uart1_write(0x48);     //H
          uart1_write(0x54);     //T
          uart1_write(0x54);     //T
          uart1_write(0x50);     //P
          uart1_write(0x50);     //P
          uart1_write(0x41);     //A
          uart1_write(0x52);     //R
          uart1_write(0x41);     //A
          uart1_write(0x3D);     //=
          uart1_write(0x22);     //"
          uart1_write(0x55);     //U
          uart1_write(0x52);     //R
          uart1_write(0x4C);     //L
          uart1_write(0x22);     //"
          uart1_write(0x2C);     //,
          uart1_write(0x22);     //"

          uart1_write(0x68);       //h
          uart1_write(0x74);       //t
          uart1_write(0x74);       //t
          uart1_write(0x70);       //p

          uart1_write(0x3A);       //:
          uart1_write(0x2F);       ///
          uart1_write(0x2F);       ///
          uart1_write(0x77);       //w
          uart1_write(0x77);       //w
          uart1_write(0x77);       //w
          uart1_write(0x2E);       //.
          uart1_write(0x72);       //r
          uart1_write(0x75);       //u
          uart1_write(0x70);       //p
          uart1_write(0x6F);       //o
          uart1_write(0x73);       //s
          uart1_write(0x68);       //h
          uart1_write(0x69);       //i
          uart1_write(0x62);       //b
          uart1_write(0x61);       //a
          uart1_write(0x6E);       //n
          uart1_write(0x67);       //g
          uart1_write(0x6C);       //l
          uart1_write(0x61);       //a
          uart1_write(0x74);       //t
          uart1_write(0x6F);       //o
          uart1_write(0x75);       //u
          uart1_write(0x72);       //r
          uart1_write(0x69);       //i
          uart1_write(0x73);       //s
          uart1_write(0x6D);       //m
          uart1_write(0x2E);       //.
          uart1_write(0x63);       //c
          uart1_write(0x6F);       //o
          uart1_write(0x6D);       //m
          uart1_write(0x2F);       ///
          uart1_write(0x74);       //t
          uart1_write(0x65);       //e
          uart1_write(0x73);       //s
          uart1_write(0x74);       //t
          uart1_write(0x2F);       ///
          uart1_write(0x68);       //h
          uart1_write(0x69);       //i
          uart1_write(0x74);       //t
          uart1_write(0x2E);       //.
          uart1_write(0x70);       //p
          uart1_write(0x68);       //h
          uart1_write(0x70);       //p
          uart1_write(0x3F);       //?
          uart1_write(0x76);       //v
          uart1_write(0x61);       //a
          uart1_write(0x6C);       //l
          uart1_write(0x31);       //1
          uart1_write(0x3D);       //=

          uart1_write(pm);         // + - value of temp
          uart1_write(left);        // left data
          uart1_write(mid);         // mid data
          uart1_write(right);       // right data
          
          
          
          uart1_write(0x26);       //&
          uart1_write(0x76);       //v
          uart1_write(0x61);       //a
          uart1_write(0x6C);       //l
          uart1_write(0x32);       //2
          uart1_write(0x3D);       //=
          //uart1_write(0x42);       // B  data

          uart1_write(0x22);      //     "                   testing by turning off " in the end !
          uart1_write(0x0D);
          uart1_write(0x0A);
}
void send_data()
{

   uart1_write_text("AT");
   uart1_write(0x0D);
   uart1_write(0x0A);
   delay_ms(500);

   uart1_write_text("AT+SAPBR=3,1,");uart1_write(0x22);uart1_write_text("Contype");uart1_write(0x22);uart1_write(0x2C);uart1_write(0x22);uart1_write_text("GPRS");uart1_write(0x22);
   uart1_write(0x0D);
   uart1_write(0x0A);
   delay_ms(500);


   uart1_write_text("AT+SAPBR=3,1,");uart1_write(0x22);uart1_write_text("APN");uart1_write(0x22);uart1_write(0x2C);uart1_write(0x22);uart1_write_text("wap");uart1_write(0x22);
   uart1_write(0x0D);
   uart1_write(0x0A);
   delay_ms(500);

   uart1_write_text("AT+SAPBR=1,1");
   uart1_write(0x0D);
   uart1_write(0x0A);
   delay_ms(9000);                         //  waiting for IP

   uart1_write_text("AT+SAPBR=2,1");
   uart1_write(0x0D);
   uart1_write(0x0A);
   delay_ms(500);

  uart1_write_text("AT+HTTPINIT");
   uart1_write(0x0D);
   uart1_write(0x0A);
   delay_ms(500);
   uart1_write_text("AT+HTTPPARA=");uart1_write(0x22);uart1_write_text("CID");uart1_write(0x22);uart1_write(0x2C);uart1_write_text("1");
   uart1_write(0x0D);
   uart1_write(0x0A);
   delay_ms(1000);

   url();

   delay_ms(2000);
   uart1_write_text("AT+HTTPACTION=1");
   uart1_write(0x0D);
   uart1_write(0x0A);
   delay_ms(9000);
   
       //    portb.f1=0;               // Status LED  for me
}
void startgsm()
{
 portd.f3=1;
 delay_ms(1000);
 portd.f3=0;
}
void main() {

uart1_init(9600);
delay_ms(2000);
trisc.f5=1;        //  rain  input
portc.f5=0;
trisb=1;
portb=0;
trisd.f3=0;
portd.f3=0;


startgsm();

//while(1)                          // for testing purpose ,i'm shutting you off

//{
        gettmp();         // get tmp
        delay_ms(1000);
        
        rh=portb;         // get humidity
        delay_ms(1000);
        rdisplay(rh);
        
        rain=portc.f5;     // get rain
        delay_ms(1000);
        raindisplay(rain);

        send_data();
        delay_ms(2000);
//}



}