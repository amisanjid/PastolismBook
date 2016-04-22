#line 1 "C:/Users/Mohammad Masud/Desktop/Bismillah/Programing Workshop/Bismillah all together.c"


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

 if(leadmatchine==0)
 {
 x=LLSB>>4;
 x=x & 0b00001111;
 y=MMSB<<4;
 y=y & 0b11110000;
 temp=0;
 temp=temp | x;
 temp=temp | y;

 pm=43;


 }
 else
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

 pm=45;
 }
 }
 void rdisplay(short int rh)
 {

 int a=rh;
 rl=a/100;
 rl=rl+48;


 rm=(a%100)/10;
 rm=rm+48;


 rr=(a%100)%10;
 rr=rr+48;

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


 mid=(a%100)/10;
 mid=mid+48;


 right=(a%100)%10;
 right=right+48;

 }
 void gettmp()
 {
 ow_reset(&portd,2);
 ow_write(&portd,2,0xCC);
 ow_write(&portd,2,0x44);

 ow_reset(&portd,2);
 ow_write(&portd,2,0xCC);
 ow_write(&portd,2,0xBE);

 LSB=ow_read(&portd,2);
 MSB=ow_read(&portd,2);


 kodomtoli(LSB,MSB);
 display(temp);
 delay_ms(1000);
 }
 void urlvoa()
{

 uart1_write(0x41);
 uart1_write(0x54);
 uart1_write(0x2B);
 uart1_write(0x48);
 uart1_write(0x54);
 uart1_write(0x54);
 uart1_write(0x50);
 uart1_write(0x50);
 uart1_write(0x41);
 uart1_write(0x52);
 uart1_write(0x41);
 uart1_write(0x3D);
 uart1_write(0x22);
 uart1_write(0x55);
 uart1_write(0x52);
 uart1_write(0x4C);
 uart1_write(0x22);
 uart1_write(0x2C);
 uart1_write(0x22);

 uart1_write(0x68);
 uart1_write(0x74);
 uart1_write(0x74);
 uart1_write(0x70);

 uart1_write(0x3A);
 uart1_write(0x2F);
 uart1_write(0x2F);
 uart1_write(0x77);
 uart1_write(0x77);
 uart1_write(0x77);
 uart1_write(0x2E);


 uart1_write(0x66);
 uart1_write(0x65);
 uart1_write(0x6C);
 uart1_write(0x6E);
 uart1_write(0x61);
 uart1_write(0x62);
 uart1_write(0x61);
 uart1_write(0x7A);
 uart1_write(0x61);
 uart1_write(0x72);
 uart1_write(0x2E);
 uart1_write(0x63);
 uart1_write(0x6F);
 uart1_write(0x6D);
 uart1_write(0x2F);
 uart1_write(0x70);
 uart1_write(0x62);
 uart1_write(0x2F);
 uart1_write(0x70);
 uart1_write(0x75);
 uart1_write(0x62);
 uart1_write(0x6C);
 uart1_write(0x69);
 uart1_write(0x63);
 uart1_write(0x2F);
 uart1_write(0x64);
 uart1_write(0x3F);
 uart1_write(0x74);
 uart1_write(0x3D);

 uart1_write(pm);
 uart1_write(left);
 uart1_write(mid);
 uart1_write(right);

 uart1_write(0x26);
 uart1_write(0x68);
 uart1_write(0x3D);

 uart1_write(rl);
 uart1_write(rm);
 uart1_write(rr);

 uart1_write(0x26);
 uart1_write(0x72);
 uart1_write(0x3D);

 uart1_write(raingo);

 uart1_write(0x26);
 uart1_write(0x77);
 uart1_write(0x73);
 uart1_write(0x3D);



 uart1_write(0x26);
 uart1_write(0x62);
 uart1_write(0x70);
 uart1_write(0x3D);



 uart1_write(0x26);
 uart1_write(0x77);
 uart1_write(0x64);
 uart1_write(0x3D);








 uart1_write(0x22);
 uart1_write(0x0D);
 uart1_write(0x0A);
}

void url()
{

 uart1_write(0x41);
 uart1_write(0x54);
 uart1_write(0x2B);
 uart1_write(0x48);
 uart1_write(0x54);
 uart1_write(0x54);
 uart1_write(0x50);
 uart1_write(0x50);
 uart1_write(0x41);
 uart1_write(0x52);
 uart1_write(0x41);
 uart1_write(0x3D);
 uart1_write(0x22);
 uart1_write(0x55);
 uart1_write(0x52);
 uart1_write(0x4C);
 uart1_write(0x22);
 uart1_write(0x2C);
 uart1_write(0x22);

 uart1_write(0x68);
 uart1_write(0x74);
 uart1_write(0x74);
 uart1_write(0x70);

 uart1_write(0x3A);
 uart1_write(0x2F);
 uart1_write(0x2F);
 uart1_write(0x77);
 uart1_write(0x77);
 uart1_write(0x77);
 uart1_write(0x2E);
 uart1_write(0x72);
 uart1_write(0x75);
 uart1_write(0x70);
 uart1_write(0x6F);
 uart1_write(0x73);
 uart1_write(0x68);
 uart1_write(0x69);
 uart1_write(0x62);
 uart1_write(0x61);
 uart1_write(0x6E);
 uart1_write(0x67);
 uart1_write(0x6C);
 uart1_write(0x61);
 uart1_write(0x74);
 uart1_write(0x6F);
 uart1_write(0x75);
 uart1_write(0x72);
 uart1_write(0x69);
 uart1_write(0x73);
 uart1_write(0x6D);
 uart1_write(0x2E);
 uart1_write(0x63);
 uart1_write(0x6F);
 uart1_write(0x6D);
 uart1_write(0x2F);
 uart1_write(0x74);
 uart1_write(0x65);
 uart1_write(0x73);
 uart1_write(0x74);
 uart1_write(0x2F);
 uart1_write(0x68);
 uart1_write(0x69);
 uart1_write(0x74);
 uart1_write(0x2E);
 uart1_write(0x70);
 uart1_write(0x68);
 uart1_write(0x70);
 uart1_write(0x3F);
 uart1_write(0x76);
 uart1_write(0x61);
 uart1_write(0x6C);
 uart1_write(0x31);
 uart1_write(0x3D);

 uart1_write(pm);
 uart1_write(left);
 uart1_write(mid);
 uart1_write(right);



 uart1_write(0x26);
 uart1_write(0x76);
 uart1_write(0x61);
 uart1_write(0x6C);
 uart1_write(0x32);
 uart1_write(0x3D);


 uart1_write(0x22);
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
 delay_ms(9000);

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
trisc.f5=1;
portc.f5=0;
trisb=1;
portb=0;
trisd.f3=0;
portd.f3=0;


startgsm();




 gettmp();
 delay_ms(1000);

 rh=portb;
 delay_ms(1000);
 rdisplay(rh);

 rain=portc.f5;
 delay_ms(1000);
 raindisplay(rain);

 send_data();
 delay_ms(2000);




}
