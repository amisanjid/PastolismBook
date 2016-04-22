
_kodomtoli:

;Bismillah all together.c,14 :: 		void kodomtoli(short int LLSB,short int MMSB)
;Bismillah all together.c,16 :: 		short int leadmatchine=0;
;Bismillah all together.c,17 :: 		short int x=0,y=0,xx=0,yy=0;
;Bismillah all together.c,19 :: 		leadmatchine=leadmatchine>>7;
	MOVLW      7
	MOVWF      R0+0
	MOVF       FARG_kodomtoli_MMSB+0, 0
	MOVWF      R1+0
	MOVF       R0+0, 0
L__kodomtoli19:
	BTFSC      STATUS+0, 2
	GOTO       L__kodomtoli20
	RRF        R1+0, 1
	BCF        R1+0, 7
	BTFSC      R1+0, 6
	BSF        R1+0, 7
	ADDLW      255
	GOTO       L__kodomtoli19
L__kodomtoli20:
;Bismillah all together.c,21 :: 		if(leadmatchine==0)       // see temp is +
	MOVF       R1+0, 0
	XORLW      0
	BTFSS      STATUS+0, 2
	GOTO       L_kodomtoli0
;Bismillah all together.c,23 :: 		x=LLSB>>4;
	MOVLW      4
	MOVWF      R1+0
	MOVF       FARG_kodomtoli_LLSB+0, 0
	MOVWF      R0+0
	MOVF       R1+0, 0
L__kodomtoli21:
	BTFSC      STATUS+0, 2
	GOTO       L__kodomtoli22
	RRF        R0+0, 1
	BCF        R0+0, 7
	BTFSC      R0+0, 6
	BSF        R0+0, 7
	ADDLW      255
	GOTO       L__kodomtoli21
L__kodomtoli22:
;Bismillah all together.c,24 :: 		x=x & 0b00001111;
	MOVLW      15
	ANDWF      R0+0, 0
	MOVWF      R2+0
;Bismillah all together.c,25 :: 		y=MMSB<<4;
	MOVLW      4
	MOVWF      R1+0
	MOVF       FARG_kodomtoli_MMSB+0, 0
	MOVWF      R0+0
	MOVF       R1+0, 0
L__kodomtoli23:
	BTFSC      STATUS+0, 2
	GOTO       L__kodomtoli24
	RLF        R0+0, 1
	BCF        R0+0, 0
	ADDLW      255
	GOTO       L__kodomtoli23
L__kodomtoli24:
;Bismillah all together.c,26 :: 		y=y & 0b11110000;
	MOVLW      240
	ANDWF      R0+0, 1
;Bismillah all together.c,27 :: 		temp=0;
	CLRF       _temp+0
;Bismillah all together.c,28 :: 		temp=temp | x;
	MOVF       R2+0, 0
	MOVWF      _temp+0
;Bismillah all together.c,29 :: 		temp=temp | y;
	MOVF       R0+0, 0
	IORWF      R2+0, 0
	MOVWF      _temp+0
;Bismillah all together.c,31 :: 		pm=43;    //decimal 43 = char +
	MOVLW      43
	MOVWF      _pm+0
	MOVLW      0
	MOVWF      _pm+1
;Bismillah all together.c,34 :: 		}
	GOTO       L_kodomtoli1
L_kodomtoli0:
;Bismillah all together.c,37 :: 		xx=~LLSB;
	COMF       FARG_kodomtoli_LLSB+0, 0
	MOVWF      R2+0
;Bismillah all together.c,38 :: 		yy=~MMSB;
	COMF       FARG_kodomtoli_MMSB+0, 0
	MOVWF      R3+0
;Bismillah all together.c,39 :: 		x=xx>>4;
	MOVLW      4
	MOVWF      R1+0
	MOVF       R2+0, 0
	MOVWF      R0+0
	MOVF       R1+0, 0
L__kodomtoli25:
	BTFSC      STATUS+0, 2
	GOTO       L__kodomtoli26
	RRF        R0+0, 1
	BCF        R0+0, 7
	BTFSC      R0+0, 6
	BSF        R0+0, 7
	ADDLW      255
	GOTO       L__kodomtoli25
L__kodomtoli26:
;Bismillah all together.c,40 :: 		x=x & 0b00001111;
	MOVLW      15
	ANDWF      R0+0, 0
	MOVWF      R2+0
;Bismillah all together.c,41 :: 		y=yy<<4;
	MOVLW      4
	MOVWF      R1+0
	MOVF       R3+0, 0
	MOVWF      R0+0
	MOVF       R1+0, 0
L__kodomtoli27:
	BTFSC      STATUS+0, 2
	GOTO       L__kodomtoli28
	RLF        R0+0, 1
	BCF        R0+0, 0
	ADDLW      255
	GOTO       L__kodomtoli27
L__kodomtoli28:
;Bismillah all together.c,42 :: 		y=y & 0b11110000;
	MOVLW      240
	ANDWF      R0+0, 1
;Bismillah all together.c,43 :: 		temp=0;
	CLRF       _temp+0
;Bismillah all together.c,44 :: 		temp=temp | x;
	MOVF       R2+0, 0
	MOVWF      _temp+0
;Bismillah all together.c,45 :: 		temp=temp | y;
	MOVF       R0+0, 0
	IORWF      R2+0, 0
	MOVWF      _temp+0
;Bismillah all together.c,47 :: 		pm=45;  // decimal 45= char -
	MOVLW      45
	MOVWF      _pm+0
	MOVLW      0
	MOVWF      _pm+1
;Bismillah all together.c,48 :: 		}
L_kodomtoli1:
;Bismillah all together.c,49 :: 		}
L_end_kodomtoli:
	RETURN
; end of _kodomtoli

_rdisplay:

;Bismillah all together.c,50 :: 		void rdisplay(short int rh)
;Bismillah all together.c,53 :: 		int a=rh;
	MOVF       FARG_rdisplay_rh+0, 0
	MOVWF      rdisplay_a_L0+0
	MOVLW      0
	BTFSC      rdisplay_a_L0+0, 7
	MOVLW      255
	MOVWF      rdisplay_a_L0+1
;Bismillah all together.c,54 :: 		rl=a/100;
	MOVLW      100
	MOVWF      R4+0
	MOVLW      0
	MOVWF      R4+1
	MOVF       rdisplay_a_L0+0, 0
	MOVWF      R0+0
	MOVF       rdisplay_a_L0+1, 0
	MOVWF      R0+1
	CALL       _Div_16x16_S+0
	MOVF       R0+0, 0
	MOVWF      _rL+0
	MOVF       R0+1, 0
	MOVWF      _rL+1
;Bismillah all together.c,55 :: 		rl=rl+48;
	MOVLW      48
	ADDWF      R0+0, 0
	MOVWF      _rL+0
	MOVF       R0+1, 0
	BTFSC      STATUS+0, 0
	ADDLW      1
	MOVWF      _rL+1
;Bismillah all together.c,58 :: 		rm=(a%100)/10;
	MOVLW      100
	MOVWF      R4+0
	MOVLW      0
	MOVWF      R4+1
	MOVF       rdisplay_a_L0+0, 0
	MOVWF      R0+0
	MOVF       rdisplay_a_L0+1, 0
	MOVWF      R0+1
	CALL       _Div_16x16_S+0
	MOVF       R8+0, 0
	MOVWF      R0+0
	MOVF       R8+1, 0
	MOVWF      R0+1
	MOVF       R0+0, 0
	MOVWF      FLOC__rdisplay+0
	MOVF       R0+1, 0
	MOVWF      FLOC__rdisplay+1
	MOVLW      10
	MOVWF      R4+0
	MOVLW      0
	MOVWF      R4+1
	MOVF       FLOC__rdisplay+0, 0
	MOVWF      R0+0
	MOVF       FLOC__rdisplay+1, 0
	MOVWF      R0+1
	CALL       _Div_16x16_S+0
	MOVF       R0+0, 0
	MOVWF      _rm+0
	MOVF       R0+1, 0
	MOVWF      _rm+1
;Bismillah all together.c,59 :: 		rm=rm+48;
	MOVLW      48
	ADDWF      R0+0, 0
	MOVWF      _rm+0
	MOVF       R0+1, 0
	BTFSC      STATUS+0, 0
	ADDLW      1
	MOVWF      _rm+1
;Bismillah all together.c,62 :: 		rr=(a%100)%10;
	MOVLW      10
	MOVWF      R4+0
	MOVLW      0
	MOVWF      R4+1
	MOVF       FLOC__rdisplay+0, 0
	MOVWF      R0+0
	MOVF       FLOC__rdisplay+1, 0
	MOVWF      R0+1
	CALL       _Div_16x16_S+0
	MOVF       R8+0, 0
	MOVWF      R0+0
	MOVF       R8+1, 0
	MOVWF      R0+1
	MOVF       R0+0, 0
	MOVWF      _rr+0
	MOVF       R0+1, 0
	MOVWF      _rr+1
;Bismillah all together.c,63 :: 		rr=rr+48;
	MOVLW      48
	ADDWF      R0+0, 0
	MOVWF      _rr+0
	MOVF       R0+1, 0
	BTFSC      STATUS+0, 0
	ADDLW      1
	MOVWF      _rr+1
;Bismillah all together.c,65 :: 		}
L_end_rdisplay:
	RETURN
; end of _rdisplay

_raindisplay:

;Bismillah all together.c,66 :: 		void raindisplay(short int rainn)
;Bismillah all together.c,69 :: 		raingo=rainn+48;
	MOVLW      48
	ADDWF      FARG_raindisplay_rainn+0, 0
	MOVWF      _raingo+0
	MOVLW      0
	BTFSC      FARG_raindisplay_rainn+0, 7
	MOVLW      255
	MOVWF      _raingo+1
	BTFSC      STATUS+0, 0
	INCF       _raingo+1, 1
;Bismillah all together.c,71 :: 		}
L_end_raindisplay:
	RETURN
; end of _raindisplay

_display:

;Bismillah all together.c,73 :: 		void display(short int temperature)
;Bismillah all together.c,76 :: 		int a=temperature;
	MOVF       FARG_display_temperature+0, 0
	MOVWF      display_a_L0+0
	MOVLW      0
	BTFSC      display_a_L0+0, 7
	MOVLW      255
	MOVWF      display_a_L0+1
;Bismillah all together.c,77 :: 		left=a/100;
	MOVLW      100
	MOVWF      R4+0
	MOVLW      0
	MOVWF      R4+1
	MOVF       display_a_L0+0, 0
	MOVWF      R0+0
	MOVF       display_a_L0+1, 0
	MOVWF      R0+1
	CALL       _Div_16x16_S+0
	MOVF       R0+0, 0
	MOVWF      _left+0
	MOVF       R0+1, 0
	MOVWF      _left+1
;Bismillah all together.c,78 :: 		left=left+48;
	MOVLW      48
	ADDWF      R0+0, 0
	MOVWF      _left+0
	MOVF       R0+1, 0
	BTFSC      STATUS+0, 0
	ADDLW      1
	MOVWF      _left+1
;Bismillah all together.c,81 :: 		mid=(a%100)/10;
	MOVLW      100
	MOVWF      R4+0
	MOVLW      0
	MOVWF      R4+1
	MOVF       display_a_L0+0, 0
	MOVWF      R0+0
	MOVF       display_a_L0+1, 0
	MOVWF      R0+1
	CALL       _Div_16x16_S+0
	MOVF       R8+0, 0
	MOVWF      R0+0
	MOVF       R8+1, 0
	MOVWF      R0+1
	MOVF       R0+0, 0
	MOVWF      FLOC__display+0
	MOVF       R0+1, 0
	MOVWF      FLOC__display+1
	MOVLW      10
	MOVWF      R4+0
	MOVLW      0
	MOVWF      R4+1
	MOVF       FLOC__display+0, 0
	MOVWF      R0+0
	MOVF       FLOC__display+1, 0
	MOVWF      R0+1
	CALL       _Div_16x16_S+0
	MOVF       R0+0, 0
	MOVWF      _mid+0
	MOVF       R0+1, 0
	MOVWF      _mid+1
;Bismillah all together.c,82 :: 		mid=mid+48;
	MOVLW      48
	ADDWF      R0+0, 0
	MOVWF      _mid+0
	MOVF       R0+1, 0
	BTFSC      STATUS+0, 0
	ADDLW      1
	MOVWF      _mid+1
;Bismillah all together.c,85 :: 		right=(a%100)%10;
	MOVLW      10
	MOVWF      R4+0
	MOVLW      0
	MOVWF      R4+1
	MOVF       FLOC__display+0, 0
	MOVWF      R0+0
	MOVF       FLOC__display+1, 0
	MOVWF      R0+1
	CALL       _Div_16x16_S+0
	MOVF       R8+0, 0
	MOVWF      R0+0
	MOVF       R8+1, 0
	MOVWF      R0+1
	MOVF       R0+0, 0
	MOVWF      _right+0
	MOVF       R0+1, 0
	MOVWF      _right+1
;Bismillah all together.c,86 :: 		right=right+48;
	MOVLW      48
	ADDWF      R0+0, 0
	MOVWF      _right+0
	MOVF       R0+1, 0
	BTFSC      STATUS+0, 0
	ADDLW      1
	MOVWF      _right+1
;Bismillah all together.c,88 :: 		}
L_end_display:
	RETURN
; end of _display

_gettmp:

;Bismillah all together.c,89 :: 		void gettmp()
;Bismillah all together.c,91 :: 		ow_reset(&portd,2);           // reset
	MOVLW      PORTD+0
	MOVWF      FARG_Ow_Reset_port+0
	MOVLW      2
	MOVWF      FARG_Ow_Reset_pin+0
	CALL       _Ow_Reset+0
;Bismillah all together.c,92 :: 		ow_write(&portd,2,0xCC);      // skip rom
	MOVLW      PORTD+0
	MOVWF      FARG_Ow_Write_port+0
	MOVLW      2
	MOVWF      FARG_Ow_Write_pin+0
	MOVLW      204
	MOVWF      FARG_Ow_Write_data_+0
	CALL       _Ow_Write+0
;Bismillah all together.c,93 :: 		ow_write(&portd,2,0x44);      // convert T
	MOVLW      PORTD+0
	MOVWF      FARG_Ow_Write_port+0
	MOVLW      2
	MOVWF      FARG_Ow_Write_pin+0
	MOVLW      68
	MOVWF      FARG_Ow_Write_data_+0
	CALL       _Ow_Write+0
;Bismillah all together.c,95 :: 		ow_reset(&portd,2);           // reset
	MOVLW      PORTD+0
	MOVWF      FARG_Ow_Reset_port+0
	MOVLW      2
	MOVWF      FARG_Ow_Reset_pin+0
	CALL       _Ow_Reset+0
;Bismillah all together.c,96 :: 		ow_write(&portd,2,0xCC);      // skip rom
	MOVLW      PORTD+0
	MOVWF      FARG_Ow_Write_port+0
	MOVLW      2
	MOVWF      FARG_Ow_Write_pin+0
	MOVLW      204
	MOVWF      FARG_Ow_Write_data_+0
	CALL       _Ow_Write+0
;Bismillah all together.c,97 :: 		ow_write(&portd,2,0xBE);      // read SCRATCHPAD
	MOVLW      PORTD+0
	MOVWF      FARG_Ow_Write_port+0
	MOVLW      2
	MOVWF      FARG_Ow_Write_pin+0
	MOVLW      190
	MOVWF      FARG_Ow_Write_data_+0
	CALL       _Ow_Write+0
;Bismillah all together.c,99 :: 		LSB=ow_read(&portd,2);
	MOVLW      PORTD+0
	MOVWF      FARG_Ow_Read_port+0
	MOVLW      2
	MOVWF      FARG_Ow_Read_pin+0
	CALL       _Ow_Read+0
	MOVF       R0+0, 0
	MOVWF      _LSB+0
;Bismillah all together.c,100 :: 		MSB=ow_read(&portd,2);
	MOVLW      PORTD+0
	MOVWF      FARG_Ow_Read_port+0
	MOVLW      2
	MOVWF      FARG_Ow_Read_pin+0
	CALL       _Ow_Read+0
	MOVF       R0+0, 0
	MOVWF      _MSB+0
;Bismillah all together.c,103 :: 		kodomtoli(LSB,MSB);
	MOVF       _LSB+0, 0
	MOVWF      FARG_kodomtoli_LLSB+0
	MOVF       R0+0, 0
	MOVWF      FARG_kodomtoli_MMSB+0
	CALL       _kodomtoli+0
;Bismillah all together.c,104 :: 		display(temp);
	MOVF       _temp+0, 0
	MOVWF      FARG_display_temperature+0
	CALL       _display+0
;Bismillah all together.c,105 :: 		delay_ms(1000);
	MOVLW      26
	MOVWF      R11+0
	MOVLW      94
	MOVWF      R12+0
	MOVLW      110
	MOVWF      R13+0
L_gettmp2:
	DECFSZ     R13+0, 1
	GOTO       L_gettmp2
	DECFSZ     R12+0, 1
	GOTO       L_gettmp2
	DECFSZ     R11+0, 1
	GOTO       L_gettmp2
	NOP
;Bismillah all together.c,106 :: 		}
L_end_gettmp:
	RETURN
; end of _gettmp

_urlvoa:

;Bismillah all together.c,107 :: 		void urlvoa()
;Bismillah all together.c,110 :: 		uart1_write(0x41);     //A
	MOVLW      65
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,111 :: 		uart1_write(0x54);     //T
	MOVLW      84
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,112 :: 		uart1_write(0x2B);     //+
	MOVLW      43
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,113 :: 		uart1_write(0x48);     //H
	MOVLW      72
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,114 :: 		uart1_write(0x54);     //T
	MOVLW      84
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,115 :: 		uart1_write(0x54);     //T
	MOVLW      84
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,116 :: 		uart1_write(0x50);     //P
	MOVLW      80
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,117 :: 		uart1_write(0x50);     //P
	MOVLW      80
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,118 :: 		uart1_write(0x41);     //A
	MOVLW      65
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,119 :: 		uart1_write(0x52);     //R
	MOVLW      82
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,120 :: 		uart1_write(0x41);     //A
	MOVLW      65
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,121 :: 		uart1_write(0x3D);     //=
	MOVLW      61
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,122 :: 		uart1_write(0x22);     //"
	MOVLW      34
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,123 :: 		uart1_write(0x55);     //U
	MOVLW      85
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,124 :: 		uart1_write(0x52);     //R
	MOVLW      82
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,125 :: 		uart1_write(0x4C);     //L
	MOVLW      76
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,126 :: 		uart1_write(0x22);     //"
	MOVLW      34
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,127 :: 		uart1_write(0x2C);     //,
	MOVLW      44
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,128 :: 		uart1_write(0x22);     //"
	MOVLW      34
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,130 :: 		uart1_write(0x68);       //h
	MOVLW      104
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,131 :: 		uart1_write(0x74);       //t
	MOVLW      116
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,132 :: 		uart1_write(0x74);       //t
	MOVLW      116
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,133 :: 		uart1_write(0x70);       //p
	MOVLW      112
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,135 :: 		uart1_write(0x3A);       //:
	MOVLW      58
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,136 :: 		uart1_write(0x2F);       ///
	MOVLW      47
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,137 :: 		uart1_write(0x2F);       ///
	MOVLW      47
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,138 :: 		uart1_write(0x77);       //w
	MOVLW      119
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,139 :: 		uart1_write(0x77);       //w
	MOVLW      119
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,140 :: 		uart1_write(0x77);       //w
	MOVLW      119
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,141 :: 		uart1_write(0x2E);       //.
	MOVLW      46
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,144 :: 		uart1_write(0x66);     //f
	MOVLW      102
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,145 :: 		uart1_write(0x65);     //e
	MOVLW      101
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,146 :: 		uart1_write(0x6C);     //l
	MOVLW      108
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,147 :: 		uart1_write(0x6E);     //n
	MOVLW      110
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,148 :: 		uart1_write(0x61);     //a
	MOVLW      97
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,149 :: 		uart1_write(0x62);     //b
	MOVLW      98
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,150 :: 		uart1_write(0x61);     //a
	MOVLW      97
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,151 :: 		uart1_write(0x7A);     //z
	MOVLW      122
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,152 :: 		uart1_write(0x61);     //a
	MOVLW      97
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,153 :: 		uart1_write(0x72);     //r
	MOVLW      114
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,154 :: 		uart1_write(0x2E);     //.
	MOVLW      46
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,155 :: 		uart1_write(0x63);     //c
	MOVLW      99
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,156 :: 		uart1_write(0x6F);     //o
	MOVLW      111
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,157 :: 		uart1_write(0x6D);     //m
	MOVLW      109
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,158 :: 		uart1_write(0x2F);     ///
	MOVLW      47
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,159 :: 		uart1_write(0x70);     //p
	MOVLW      112
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,160 :: 		uart1_write(0x62);     //b
	MOVLW      98
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,161 :: 		uart1_write(0x2F);     ///
	MOVLW      47
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,162 :: 		uart1_write(0x70);     //p
	MOVLW      112
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,163 :: 		uart1_write(0x75);     //u
	MOVLW      117
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,164 :: 		uart1_write(0x62);     //b
	MOVLW      98
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,165 :: 		uart1_write(0x6C);     //l
	MOVLW      108
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,166 :: 		uart1_write(0x69);     //i
	MOVLW      105
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,167 :: 		uart1_write(0x63);     //c
	MOVLW      99
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,168 :: 		uart1_write(0x2F);     ///
	MOVLW      47
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,169 :: 		uart1_write(0x64);     //d
	MOVLW      100
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,170 :: 		uart1_write(0x3F);     //?
	MOVLW      63
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,171 :: 		uart1_write(0x74);     //t
	MOVLW      116
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,172 :: 		uart1_write(0x3D);     //=
	MOVLW      61
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,174 :: 		uart1_write(pm);         // + - value of temp
	MOVF       _pm+0, 0
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,175 :: 		uart1_write(left);        // left data
	MOVF       _left+0, 0
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,176 :: 		uart1_write(mid);         // mid data
	MOVF       _mid+0, 0
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,177 :: 		uart1_write(right);       // right data
	MOVF       _right+0, 0
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,179 :: 		uart1_write(0x26);      //&
	MOVLW      38
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,180 :: 		uart1_write(0x68);      //h
	MOVLW      104
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,181 :: 		uart1_write(0x3D);      //=
	MOVLW      61
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,183 :: 		uart1_write(rl);                   // left rh
	MOVF       _rL+0, 0
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,184 :: 		uart1_write(rm);                   // mid rh
	MOVF       _rm+0, 0
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,185 :: 		uart1_write(rr);                   // right rh
	MOVF       _rr+0, 0
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,187 :: 		uart1_write(0x26);      //&
	MOVLW      38
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,188 :: 		uart1_write(0x72);      //r
	MOVLW      114
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,189 :: 		uart1_write(0x3D);      //=
	MOVLW      61
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,191 :: 		uart1_write(raingo);                   //  one data  1  / 0  here
	MOVF       _raingo+0, 0
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,193 :: 		uart1_write(0x26);      //&
	MOVLW      38
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,194 :: 		uart1_write(0x77);      //w
	MOVLW      119
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,195 :: 		uart1_write(0x73);      //s
	MOVLW      115
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,196 :: 		uart1_write(0x3D);      //=
	MOVLW      61
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,200 :: 		uart1_write(0x26);      //&
	MOVLW      38
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,201 :: 		uart1_write(0x62);      //b
	MOVLW      98
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,202 :: 		uart1_write(0x70);      //p
	MOVLW      112
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,203 :: 		uart1_write(0x3D);      //=
	MOVLW      61
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,207 :: 		uart1_write(0x26);      //&
	MOVLW      38
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,208 :: 		uart1_write(0x77);      //w
	MOVLW      119
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,209 :: 		uart1_write(0x64);      //d
	MOVLW      100
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,210 :: 		uart1_write(0x3D);      //=
	MOVLW      61
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,219 :: 		uart1_write(0x22);      //     "                   testing by turning off " in the end !
	MOVLW      34
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,220 :: 		uart1_write(0x0D);
	MOVLW      13
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,221 :: 		uart1_write(0x0A);
	MOVLW      10
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,222 :: 		}
L_end_urlvoa:
	RETURN
; end of _urlvoa

_url:

;Bismillah all together.c,224 :: 		void url()
;Bismillah all together.c,227 :: 		uart1_write(0x41);     //A
	MOVLW      65
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,228 :: 		uart1_write(0x54);     //T
	MOVLW      84
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,229 :: 		uart1_write(0x2B);     //+
	MOVLW      43
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,230 :: 		uart1_write(0x48);     //H
	MOVLW      72
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,231 :: 		uart1_write(0x54);     //T
	MOVLW      84
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,232 :: 		uart1_write(0x54);     //T
	MOVLW      84
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,233 :: 		uart1_write(0x50);     //P
	MOVLW      80
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,234 :: 		uart1_write(0x50);     //P
	MOVLW      80
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,235 :: 		uart1_write(0x41);     //A
	MOVLW      65
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,236 :: 		uart1_write(0x52);     //R
	MOVLW      82
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,237 :: 		uart1_write(0x41);     //A
	MOVLW      65
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,238 :: 		uart1_write(0x3D);     //=
	MOVLW      61
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,239 :: 		uart1_write(0x22);     //"
	MOVLW      34
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,240 :: 		uart1_write(0x55);     //U
	MOVLW      85
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,241 :: 		uart1_write(0x52);     //R
	MOVLW      82
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,242 :: 		uart1_write(0x4C);     //L
	MOVLW      76
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,243 :: 		uart1_write(0x22);     //"
	MOVLW      34
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,244 :: 		uart1_write(0x2C);     //,
	MOVLW      44
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,245 :: 		uart1_write(0x22);     //"
	MOVLW      34
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,247 :: 		uart1_write(0x68);       //h
	MOVLW      104
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,248 :: 		uart1_write(0x74);       //t
	MOVLW      116
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,249 :: 		uart1_write(0x74);       //t
	MOVLW      116
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,250 :: 		uart1_write(0x70);       //p
	MOVLW      112
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,252 :: 		uart1_write(0x3A);       //:
	MOVLW      58
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,253 :: 		uart1_write(0x2F);       ///
	MOVLW      47
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,254 :: 		uart1_write(0x2F);       ///
	MOVLW      47
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,255 :: 		uart1_write(0x77);       //w
	MOVLW      119
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,256 :: 		uart1_write(0x77);       //w
	MOVLW      119
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,257 :: 		uart1_write(0x77);       //w
	MOVLW      119
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,258 :: 		uart1_write(0x2E);       //.
	MOVLW      46
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,259 :: 		uart1_write(0x72);       //r
	MOVLW      114
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,260 :: 		uart1_write(0x75);       //u
	MOVLW      117
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,261 :: 		uart1_write(0x70);       //p
	MOVLW      112
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,262 :: 		uart1_write(0x6F);       //o
	MOVLW      111
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,263 :: 		uart1_write(0x73);       //s
	MOVLW      115
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,264 :: 		uart1_write(0x68);       //h
	MOVLW      104
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,265 :: 		uart1_write(0x69);       //i
	MOVLW      105
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,266 :: 		uart1_write(0x62);       //b
	MOVLW      98
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,267 :: 		uart1_write(0x61);       //a
	MOVLW      97
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,268 :: 		uart1_write(0x6E);       //n
	MOVLW      110
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,269 :: 		uart1_write(0x67);       //g
	MOVLW      103
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,270 :: 		uart1_write(0x6C);       //l
	MOVLW      108
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,271 :: 		uart1_write(0x61);       //a
	MOVLW      97
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,272 :: 		uart1_write(0x74);       //t
	MOVLW      116
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,273 :: 		uart1_write(0x6F);       //o
	MOVLW      111
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,274 :: 		uart1_write(0x75);       //u
	MOVLW      117
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,275 :: 		uart1_write(0x72);       //r
	MOVLW      114
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,276 :: 		uart1_write(0x69);       //i
	MOVLW      105
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,277 :: 		uart1_write(0x73);       //s
	MOVLW      115
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,278 :: 		uart1_write(0x6D);       //m
	MOVLW      109
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,279 :: 		uart1_write(0x2E);       //.
	MOVLW      46
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,280 :: 		uart1_write(0x63);       //c
	MOVLW      99
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,281 :: 		uart1_write(0x6F);       //o
	MOVLW      111
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,282 :: 		uart1_write(0x6D);       //m
	MOVLW      109
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,283 :: 		uart1_write(0x2F);       ///
	MOVLW      47
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,284 :: 		uart1_write(0x74);       //t
	MOVLW      116
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,285 :: 		uart1_write(0x65);       //e
	MOVLW      101
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,286 :: 		uart1_write(0x73);       //s
	MOVLW      115
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,287 :: 		uart1_write(0x74);       //t
	MOVLW      116
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,288 :: 		uart1_write(0x2F);       ///
	MOVLW      47
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,289 :: 		uart1_write(0x68);       //h
	MOVLW      104
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,290 :: 		uart1_write(0x69);       //i
	MOVLW      105
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,291 :: 		uart1_write(0x74);       //t
	MOVLW      116
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,292 :: 		uart1_write(0x2E);       //.
	MOVLW      46
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,293 :: 		uart1_write(0x70);       //p
	MOVLW      112
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,294 :: 		uart1_write(0x68);       //h
	MOVLW      104
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,295 :: 		uart1_write(0x70);       //p
	MOVLW      112
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,296 :: 		uart1_write(0x3F);       //?
	MOVLW      63
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,297 :: 		uart1_write(0x76);       //v
	MOVLW      118
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,298 :: 		uart1_write(0x61);       //a
	MOVLW      97
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,299 :: 		uart1_write(0x6C);       //l
	MOVLW      108
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,300 :: 		uart1_write(0x31);       //1
	MOVLW      49
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,301 :: 		uart1_write(0x3D);       //=
	MOVLW      61
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,303 :: 		uart1_write(pm);         // + - value of temp
	MOVF       _pm+0, 0
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,304 :: 		uart1_write(left);        // left data
	MOVF       _left+0, 0
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,305 :: 		uart1_write(mid);         // mid data
	MOVF       _mid+0, 0
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,306 :: 		uart1_write(right);       // right data
	MOVF       _right+0, 0
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,310 :: 		uart1_write(0x26);       //&
	MOVLW      38
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,311 :: 		uart1_write(0x76);       //v
	MOVLW      118
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,312 :: 		uart1_write(0x61);       //a
	MOVLW      97
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,313 :: 		uart1_write(0x6C);       //l
	MOVLW      108
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,314 :: 		uart1_write(0x32);       //2
	MOVLW      50
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,315 :: 		uart1_write(0x3D);       //=
	MOVLW      61
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,318 :: 		uart1_write(0x22);      //     "                   testing by turning off " in the end !
	MOVLW      34
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,319 :: 		uart1_write(0x0D);
	MOVLW      13
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,320 :: 		uart1_write(0x0A);
	MOVLW      10
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,321 :: 		}
L_end_url:
	RETURN
; end of _url

_send_data:

;Bismillah all together.c,322 :: 		void send_data()
;Bismillah all together.c,325 :: 		uart1_write_text("AT");
	MOVLW      ?lstr1_Bismillah_32all_32together+0
	MOVWF      FARG_UART1_Write_Text_uart_text+0
	CALL       _UART1_Write_Text+0
;Bismillah all together.c,326 :: 		uart1_write(0x0D);
	MOVLW      13
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,327 :: 		uart1_write(0x0A);
	MOVLW      10
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,328 :: 		delay_ms(500);
	MOVLW      13
	MOVWF      R11+0
	MOVLW      175
	MOVWF      R12+0
	MOVLW      182
	MOVWF      R13+0
L_send_data3:
	DECFSZ     R13+0, 1
	GOTO       L_send_data3
	DECFSZ     R12+0, 1
	GOTO       L_send_data3
	DECFSZ     R11+0, 1
	GOTO       L_send_data3
	NOP
;Bismillah all together.c,330 :: 		uart1_write_text("AT+SAPBR=3,1,");uart1_write(0x22);uart1_write_text("Contype");uart1_write(0x22);uart1_write(0x2C);uart1_write(0x22);uart1_write_text("GPRS");uart1_write(0x22);
	MOVLW      ?lstr2_Bismillah_32all_32together+0
	MOVWF      FARG_UART1_Write_Text_uart_text+0
	CALL       _UART1_Write_Text+0
	MOVLW      34
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
	MOVLW      ?lstr3_Bismillah_32all_32together+0
	MOVWF      FARG_UART1_Write_Text_uart_text+0
	CALL       _UART1_Write_Text+0
	MOVLW      34
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
	MOVLW      44
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
	MOVLW      34
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
	MOVLW      ?lstr4_Bismillah_32all_32together+0
	MOVWF      FARG_UART1_Write_Text_uart_text+0
	CALL       _UART1_Write_Text+0
	MOVLW      34
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,331 :: 		uart1_write(0x0D);
	MOVLW      13
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,332 :: 		uart1_write(0x0A);
	MOVLW      10
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,333 :: 		delay_ms(500);
	MOVLW      13
	MOVWF      R11+0
	MOVLW      175
	MOVWF      R12+0
	MOVLW      182
	MOVWF      R13+0
L_send_data4:
	DECFSZ     R13+0, 1
	GOTO       L_send_data4
	DECFSZ     R12+0, 1
	GOTO       L_send_data4
	DECFSZ     R11+0, 1
	GOTO       L_send_data4
	NOP
;Bismillah all together.c,336 :: 		uart1_write_text("AT+SAPBR=3,1,");uart1_write(0x22);uart1_write_text("APN");uart1_write(0x22);uart1_write(0x2C);uart1_write(0x22);uart1_write_text("wap");uart1_write(0x22);
	MOVLW      ?lstr5_Bismillah_32all_32together+0
	MOVWF      FARG_UART1_Write_Text_uart_text+0
	CALL       _UART1_Write_Text+0
	MOVLW      34
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
	MOVLW      ?lstr6_Bismillah_32all_32together+0
	MOVWF      FARG_UART1_Write_Text_uart_text+0
	CALL       _UART1_Write_Text+0
	MOVLW      34
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
	MOVLW      44
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
	MOVLW      34
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
	MOVLW      ?lstr7_Bismillah_32all_32together+0
	MOVWF      FARG_UART1_Write_Text_uart_text+0
	CALL       _UART1_Write_Text+0
	MOVLW      34
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,337 :: 		uart1_write(0x0D);
	MOVLW      13
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,338 :: 		uart1_write(0x0A);
	MOVLW      10
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,339 :: 		delay_ms(500);
	MOVLW      13
	MOVWF      R11+0
	MOVLW      175
	MOVWF      R12+0
	MOVLW      182
	MOVWF      R13+0
L_send_data5:
	DECFSZ     R13+0, 1
	GOTO       L_send_data5
	DECFSZ     R12+0, 1
	GOTO       L_send_data5
	DECFSZ     R11+0, 1
	GOTO       L_send_data5
	NOP
;Bismillah all together.c,341 :: 		uart1_write_text("AT+SAPBR=1,1");
	MOVLW      ?lstr8_Bismillah_32all_32together+0
	MOVWF      FARG_UART1_Write_Text_uart_text+0
	CALL       _UART1_Write_Text+0
;Bismillah all together.c,342 :: 		uart1_write(0x0D);
	MOVLW      13
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,343 :: 		uart1_write(0x0A);
	MOVLW      10
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,344 :: 		delay_ms(9000);                         //  waiting for IP
	MOVLW      229
	MOVWF      R11+0
	MOVLW      73
	MOVWF      R12+0
	MOVLW      245
	MOVWF      R13+0
L_send_data6:
	DECFSZ     R13+0, 1
	GOTO       L_send_data6
	DECFSZ     R12+0, 1
	GOTO       L_send_data6
	DECFSZ     R11+0, 1
	GOTO       L_send_data6
;Bismillah all together.c,346 :: 		uart1_write_text("AT+SAPBR=2,1");
	MOVLW      ?lstr9_Bismillah_32all_32together+0
	MOVWF      FARG_UART1_Write_Text_uart_text+0
	CALL       _UART1_Write_Text+0
;Bismillah all together.c,347 :: 		uart1_write(0x0D);
	MOVLW      13
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,348 :: 		uart1_write(0x0A);
	MOVLW      10
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,349 :: 		delay_ms(500);
	MOVLW      13
	MOVWF      R11+0
	MOVLW      175
	MOVWF      R12+0
	MOVLW      182
	MOVWF      R13+0
L_send_data7:
	DECFSZ     R13+0, 1
	GOTO       L_send_data7
	DECFSZ     R12+0, 1
	GOTO       L_send_data7
	DECFSZ     R11+0, 1
	GOTO       L_send_data7
	NOP
;Bismillah all together.c,351 :: 		uart1_write_text("AT+HTTPINIT");
	MOVLW      ?lstr10_Bismillah_32all_32together+0
	MOVWF      FARG_UART1_Write_Text_uart_text+0
	CALL       _UART1_Write_Text+0
;Bismillah all together.c,352 :: 		uart1_write(0x0D);
	MOVLW      13
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,353 :: 		uart1_write(0x0A);
	MOVLW      10
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,354 :: 		delay_ms(500);
	MOVLW      13
	MOVWF      R11+0
	MOVLW      175
	MOVWF      R12+0
	MOVLW      182
	MOVWF      R13+0
L_send_data8:
	DECFSZ     R13+0, 1
	GOTO       L_send_data8
	DECFSZ     R12+0, 1
	GOTO       L_send_data8
	DECFSZ     R11+0, 1
	GOTO       L_send_data8
	NOP
;Bismillah all together.c,355 :: 		uart1_write_text("AT+HTTPPARA=");uart1_write(0x22);uart1_write_text("CID");uart1_write(0x22);uart1_write(0x2C);uart1_write_text("1");
	MOVLW      ?lstr11_Bismillah_32all_32together+0
	MOVWF      FARG_UART1_Write_Text_uart_text+0
	CALL       _UART1_Write_Text+0
	MOVLW      34
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
	MOVLW      ?lstr12_Bismillah_32all_32together+0
	MOVWF      FARG_UART1_Write_Text_uart_text+0
	CALL       _UART1_Write_Text+0
	MOVLW      34
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
	MOVLW      44
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
	MOVLW      ?lstr13_Bismillah_32all_32together+0
	MOVWF      FARG_UART1_Write_Text_uart_text+0
	CALL       _UART1_Write_Text+0
;Bismillah all together.c,356 :: 		uart1_write(0x0D);
	MOVLW      13
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,357 :: 		uart1_write(0x0A);
	MOVLW      10
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,358 :: 		delay_ms(1000);
	MOVLW      26
	MOVWF      R11+0
	MOVLW      94
	MOVWF      R12+0
	MOVLW      110
	MOVWF      R13+0
L_send_data9:
	DECFSZ     R13+0, 1
	GOTO       L_send_data9
	DECFSZ     R12+0, 1
	GOTO       L_send_data9
	DECFSZ     R11+0, 1
	GOTO       L_send_data9
	NOP
;Bismillah all together.c,360 :: 		url();
	CALL       _url+0
;Bismillah all together.c,362 :: 		delay_ms(2000);
	MOVLW      51
	MOVWF      R11+0
	MOVLW      187
	MOVWF      R12+0
	MOVLW      223
	MOVWF      R13+0
L_send_data10:
	DECFSZ     R13+0, 1
	GOTO       L_send_data10
	DECFSZ     R12+0, 1
	GOTO       L_send_data10
	DECFSZ     R11+0, 1
	GOTO       L_send_data10
	NOP
	NOP
;Bismillah all together.c,363 :: 		uart1_write_text("AT+HTTPACTION=1");
	MOVLW      ?lstr14_Bismillah_32all_32together+0
	MOVWF      FARG_UART1_Write_Text_uart_text+0
	CALL       _UART1_Write_Text+0
;Bismillah all together.c,364 :: 		uart1_write(0x0D);
	MOVLW      13
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,365 :: 		uart1_write(0x0A);
	MOVLW      10
	MOVWF      FARG_UART1_Write_data_+0
	CALL       _UART1_Write+0
;Bismillah all together.c,366 :: 		delay_ms(9000);
	MOVLW      229
	MOVWF      R11+0
	MOVLW      73
	MOVWF      R12+0
	MOVLW      245
	MOVWF      R13+0
L_send_data11:
	DECFSZ     R13+0, 1
	GOTO       L_send_data11
	DECFSZ     R12+0, 1
	GOTO       L_send_data11
	DECFSZ     R11+0, 1
	GOTO       L_send_data11
;Bismillah all together.c,369 :: 		}
L_end_send_data:
	RETURN
; end of _send_data

_startgsm:

;Bismillah all together.c,370 :: 		void startgsm()
;Bismillah all together.c,372 :: 		portd.f3=1;
	BSF        PORTD+0, 3
;Bismillah all together.c,373 :: 		delay_ms(1000);
	MOVLW      26
	MOVWF      R11+0
	MOVLW      94
	MOVWF      R12+0
	MOVLW      110
	MOVWF      R13+0
L_startgsm12:
	DECFSZ     R13+0, 1
	GOTO       L_startgsm12
	DECFSZ     R12+0, 1
	GOTO       L_startgsm12
	DECFSZ     R11+0, 1
	GOTO       L_startgsm12
	NOP
;Bismillah all together.c,374 :: 		portd.f3=0;
	BCF        PORTD+0, 3
;Bismillah all together.c,375 :: 		}
L_end_startgsm:
	RETURN
; end of _startgsm

_main:

;Bismillah all together.c,376 :: 		void main() {
;Bismillah all together.c,378 :: 		uart1_init(9600);
	MOVLW      129
	MOVWF      SPBRG+0
	BSF        TXSTA+0, 2
	CALL       _UART1_Init+0
;Bismillah all together.c,379 :: 		delay_ms(2000);
	MOVLW      51
	MOVWF      R11+0
	MOVLW      187
	MOVWF      R12+0
	MOVLW      223
	MOVWF      R13+0
L_main13:
	DECFSZ     R13+0, 1
	GOTO       L_main13
	DECFSZ     R12+0, 1
	GOTO       L_main13
	DECFSZ     R11+0, 1
	GOTO       L_main13
	NOP
	NOP
;Bismillah all together.c,380 :: 		trisc.f5=1;        //  rain  input
	BSF        TRISC+0, 5
;Bismillah all together.c,381 :: 		portc.f5=0;
	BCF        PORTC+0, 5
;Bismillah all together.c,382 :: 		trisb=1;
	MOVLW      1
	MOVWF      TRISB+0
;Bismillah all together.c,383 :: 		portb=0;
	CLRF       PORTB+0
;Bismillah all together.c,384 :: 		trisd.f3=0;
	BCF        TRISD+0, 3
;Bismillah all together.c,385 :: 		portd.f3=0;
	BCF        PORTD+0, 3
;Bismillah all together.c,388 :: 		startgsm();
	CALL       _startgsm+0
;Bismillah all together.c,393 :: 		gettmp();         // get tmp
	CALL       _gettmp+0
;Bismillah all together.c,394 :: 		delay_ms(1000);
	MOVLW      26
	MOVWF      R11+0
	MOVLW      94
	MOVWF      R12+0
	MOVLW      110
	MOVWF      R13+0
L_main14:
	DECFSZ     R13+0, 1
	GOTO       L_main14
	DECFSZ     R12+0, 1
	GOTO       L_main14
	DECFSZ     R11+0, 1
	GOTO       L_main14
	NOP
;Bismillah all together.c,396 :: 		rh=portb;         // get humidity
	MOVF       PORTB+0, 0
	MOVWF      _rh+0
	CLRF       _rh+1
;Bismillah all together.c,397 :: 		delay_ms(1000);
	MOVLW      26
	MOVWF      R11+0
	MOVLW      94
	MOVWF      R12+0
	MOVLW      110
	MOVWF      R13+0
L_main15:
	DECFSZ     R13+0, 1
	GOTO       L_main15
	DECFSZ     R12+0, 1
	GOTO       L_main15
	DECFSZ     R11+0, 1
	GOTO       L_main15
	NOP
;Bismillah all together.c,398 :: 		rdisplay(rh);
	MOVF       _rh+0, 0
	MOVWF      FARG_rdisplay_rh+0
	CALL       _rdisplay+0
;Bismillah all together.c,400 :: 		rain=portc.f5;     // get rain
	MOVLW      0
	BTFSC      PORTC+0, 5
	MOVLW      1
	MOVWF      _rain+0
	CLRF       _rain+1
;Bismillah all together.c,401 :: 		delay_ms(1000);
	MOVLW      26
	MOVWF      R11+0
	MOVLW      94
	MOVWF      R12+0
	MOVLW      110
	MOVWF      R13+0
L_main16:
	DECFSZ     R13+0, 1
	GOTO       L_main16
	DECFSZ     R12+0, 1
	GOTO       L_main16
	DECFSZ     R11+0, 1
	GOTO       L_main16
	NOP
;Bismillah all together.c,402 :: 		raindisplay(rain);
	MOVF       _rain+0, 0
	MOVWF      FARG_raindisplay_rainn+0
	CALL       _raindisplay+0
;Bismillah all together.c,404 :: 		send_data();
	CALL       _send_data+0
;Bismillah all together.c,405 :: 		delay_ms(2000);
	MOVLW      51
	MOVWF      R11+0
	MOVLW      187
	MOVWF      R12+0
	MOVLW      223
	MOVWF      R13+0
L_main17:
	DECFSZ     R13+0, 1
	GOTO       L_main17
	DECFSZ     R12+0, 1
	GOTO       L_main17
	DECFSZ     R11+0, 1
	GOTO       L_main17
	NOP
	NOP
;Bismillah all together.c,410 :: 		}
L_end_main:
	GOTO       $+0
; end of _main
