#line 1 "C:/Users/Mohammad Masud/Desktop/Bismillah/Programing Workshop/TMP humidity to arange/bismillah humidity.c"




sbit Data at RA0_bit;
sbit DataDir at TRISA0_bit;
char message1[] = "Temp = 00.0 C";
char message2[] = "RH   = 00.0 %";
unsigned short TOUT = 0, CheckSum, i;
unsigned short T_Byte1, T_Byte2, RH_Byte1, RH_Byte2;
int a;

void StartSignal(){
 DataDir = 0;
 Data = 0;
 Delay_ms(25);
 Data = 1;
 Delay_us(30);
 DataDir = 1;

}

unsigned short CheckResponse(){
 TOUT = 0;
 TMR2 = 0;
 T2CON.TMR2ON = 1;
 while(!Data && !TOUT);
 if (TOUT) return 0;
 else {
 TMR2 = 0;
 while(Data && !TOUT);
 if (TOUT) return 0;
 else {
 T2CON.TMR2ON = 0;
 return 1;
 }
 }
}

unsigned short ReadByte(){
 unsigned short num = 0, t;
 DataDir = 1;
 for (i=0; i<8; i++){
 while(!Data);
 TMR2 = 0;
 T2CON.TMR2ON = 1;
 while(Data);
 T2CON.TMR2ON = 0;
 if(TMR2 > 40) num |= 1<<(7-i);
 }
 return num;
}

void interrupt(){
 if(PIR1.TMR2IF){
 TOUT = 1;
 T2CON.TMR2ON = 0;
 PIR1.TMR2IF = 0;
 }
}

void main() {
 unsigned short check;
 TRISB = 0;
 PORTB = 0;
 TRISA = 0b00100001;
 CMCON = 7;
 INTCON.GIE = 1;
 INTCON.PEIE = 1;

 PIE1.TMR2IE = 1;
 T2CON = 0;
 PIR1.TMR2IF =0;
 TMR2 = 0;

 delay_ms(3000);


 do {
 Delay_ms(1000);
 StartSignal();
 check = CheckResponse();
 if (!check) {
#line 87 "C:/Users/Mohammad Masud/Desktop/Bismillah/Programing Workshop/TMP humidity to arange/bismillah humidity.c"
 }
 else{

 RH_Byte1 = ReadByte();
 RH_Byte2 = ReadByte();
 T_Byte1 = ReadByte();
 T_Byte2 = ReadByte();
 CheckSum = ReadByte();

 if (CheckSum == ((RH_Byte1 + RH_Byte2 + T_Byte1 + T_Byte2) & 0xFF))
 {






 message1[11] = 223;

 a = RH_Byte1;
 portb=a;
#line 112 "C:/Users/Mohammad Masud/Desktop/Bismillah/Programing Workshop/TMP humidity to arange/bismillah humidity.c"
 }

 else{
#line 118 "C:/Users/Mohammad Masud/Desktop/Bismillah/Programing Workshop/TMP humidity to arange/bismillah humidity.c"
 }
 }

 }while(1);
}
