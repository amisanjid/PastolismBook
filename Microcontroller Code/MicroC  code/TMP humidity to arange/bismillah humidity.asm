
_StartSignal:

;bismillah humidity.c,13 :: 		void StartSignal(){
;bismillah humidity.c,14 :: 		DataDir = 0;     // Data port is output
	BCF        TRISA0_bit+0, BitPos(TRISA0_bit+0)
;bismillah humidity.c,15 :: 		Data    = 0;
	BCF        RA0_bit+0, BitPos(RA0_bit+0)
;bismillah humidity.c,16 :: 		Delay_ms(25);
	MOVLW      33
	MOVWF      R12+0
	MOVLW      118
	MOVWF      R13+0
L_StartSignal0:
	DECFSZ     R13+0, 1
	GOTO       L_StartSignal0
	DECFSZ     R12+0, 1
	GOTO       L_StartSignal0
	NOP
;bismillah humidity.c,17 :: 		Data    = 1;
	BSF        RA0_bit+0, BitPos(RA0_bit+0)
;bismillah humidity.c,18 :: 		Delay_us(30);
	MOVLW      9
	MOVWF      R13+0
L_StartSignal1:
	DECFSZ     R13+0, 1
	GOTO       L_StartSignal1
	NOP
	NOP
;bismillah humidity.c,19 :: 		DataDir = 1;     // Data port is input
	BSF        TRISA0_bit+0, BitPos(TRISA0_bit+0)
;bismillah humidity.c,21 :: 		}
L_end_StartSignal:
	RETURN
; end of _StartSignal

_CheckResponse:

;bismillah humidity.c,23 :: 		unsigned short CheckResponse(){
;bismillah humidity.c,24 :: 		TOUT = 0;
	CLRF       _TOUT+0
;bismillah humidity.c,25 :: 		TMR2 = 0;
	CLRF       TMR2+0
;bismillah humidity.c,26 :: 		T2CON.TMR2ON = 1;      // start timer
	BSF        T2CON+0, 2
;bismillah humidity.c,27 :: 		while(!Data && !TOUT);
L_CheckResponse2:
	BTFSC      RA0_bit+0, BitPos(RA0_bit+0)
	GOTO       L_CheckResponse3
	MOVF       _TOUT+0, 0
	BTFSS      STATUS+0, 2
	GOTO       L_CheckResponse3
L__CheckResponse33:
	GOTO       L_CheckResponse2
L_CheckResponse3:
;bismillah humidity.c,28 :: 		if (TOUT) return 0;
	MOVF       _TOUT+0, 0
	BTFSC      STATUS+0, 2
	GOTO       L_CheckResponse6
	CLRF       R0+0
	GOTO       L_end_CheckResponse
L_CheckResponse6:
;bismillah humidity.c,30 :: 		TMR2 = 0;
	CLRF       TMR2+0
;bismillah humidity.c,31 :: 		while(Data && !TOUT);
L_CheckResponse8:
	BTFSS      RA0_bit+0, BitPos(RA0_bit+0)
	GOTO       L_CheckResponse9
	MOVF       _TOUT+0, 0
	BTFSS      STATUS+0, 2
	GOTO       L_CheckResponse9
L__CheckResponse32:
	GOTO       L_CheckResponse8
L_CheckResponse9:
;bismillah humidity.c,32 :: 		if (TOUT) return 0;
	MOVF       _TOUT+0, 0
	BTFSC      STATUS+0, 2
	GOTO       L_CheckResponse12
	CLRF       R0+0
	GOTO       L_end_CheckResponse
L_CheckResponse12:
;bismillah humidity.c,34 :: 		T2CON.TMR2ON = 0;
	BCF        T2CON+0, 2
;bismillah humidity.c,35 :: 		return 1;
	MOVLW      1
	MOVWF      R0+0
;bismillah humidity.c,38 :: 		}
L_end_CheckResponse:
	RETURN
; end of _CheckResponse

_ReadByte:

;bismillah humidity.c,40 :: 		unsigned short ReadByte(){
;bismillah humidity.c,41 :: 		unsigned short num = 0, t;
	CLRF       ReadByte_num_L0+0
;bismillah humidity.c,42 :: 		DataDir = 1;
	BSF        TRISA0_bit+0, BitPos(TRISA0_bit+0)
;bismillah humidity.c,43 :: 		for (i=0; i<8; i++){
	CLRF       _i+0
L_ReadByte14:
	MOVLW      8
	SUBWF      _i+0, 0
	BTFSC      STATUS+0, 0
	GOTO       L_ReadByte15
;bismillah humidity.c,44 :: 		while(!Data);
L_ReadByte17:
	BTFSC      RA0_bit+0, BitPos(RA0_bit+0)
	GOTO       L_ReadByte18
	GOTO       L_ReadByte17
L_ReadByte18:
;bismillah humidity.c,45 :: 		TMR2 = 0;
	CLRF       TMR2+0
;bismillah humidity.c,46 :: 		T2CON.TMR2ON = 1;
	BSF        T2CON+0, 2
;bismillah humidity.c,47 :: 		while(Data);
L_ReadByte19:
	BTFSS      RA0_bit+0, BitPos(RA0_bit+0)
	GOTO       L_ReadByte20
	GOTO       L_ReadByte19
L_ReadByte20:
;bismillah humidity.c,48 :: 		T2CON.TMR2ON = 0;
	BCF        T2CON+0, 2
;bismillah humidity.c,49 :: 		if(TMR2 > 40) num |= 1<<(7-i);  // If time > 40us, Data is 1
	MOVF       TMR2+0, 0
	SUBLW      40
	BTFSC      STATUS+0, 0
	GOTO       L_ReadByte21
	MOVF       _i+0, 0
	SUBLW      7
	MOVWF      R0+0
	MOVF       R0+0, 0
	MOVWF      R1+0
	MOVLW      1
	MOVWF      R0+0
	MOVF       R1+0, 0
L__ReadByte37:
	BTFSC      STATUS+0, 2
	GOTO       L__ReadByte38
	RLF        R0+0, 1
	BCF        R0+0, 0
	ADDLW      255
	GOTO       L__ReadByte37
L__ReadByte38:
	MOVF       R0+0, 0
	IORWF      ReadByte_num_L0+0, 1
L_ReadByte21:
;bismillah humidity.c,43 :: 		for (i=0; i<8; i++){
	INCF       _i+0, 1
;bismillah humidity.c,50 :: 		}
	GOTO       L_ReadByte14
L_ReadByte15:
;bismillah humidity.c,51 :: 		return num;
	MOVF       ReadByte_num_L0+0, 0
	MOVWF      R0+0
;bismillah humidity.c,52 :: 		}
L_end_ReadByte:
	RETURN
; end of _ReadByte

_interrupt:
	MOVWF      R15+0
	SWAPF      STATUS+0, 0
	CLRF       STATUS+0
	MOVWF      ___saveSTATUS+0
	MOVF       PCLATH+0, 0
	MOVWF      ___savePCLATH+0
	CLRF       PCLATH+0

;bismillah humidity.c,54 :: 		void interrupt(){
;bismillah humidity.c,55 :: 		if(PIR1.TMR2IF){
	BTFSS      PIR1+0, 1
	GOTO       L_interrupt22
;bismillah humidity.c,56 :: 		TOUT = 1;
	MOVLW      1
	MOVWF      _TOUT+0
;bismillah humidity.c,57 :: 		T2CON.TMR2ON = 0; // stop timer
	BCF        T2CON+0, 2
;bismillah humidity.c,58 :: 		PIR1.TMR2IF  = 0; // Clear TMR0 interrupt flag
	BCF        PIR1+0, 1
;bismillah humidity.c,59 :: 		}
L_interrupt22:
;bismillah humidity.c,60 :: 		}
L_end_interrupt:
L__interrupt40:
	MOVF       ___savePCLATH+0, 0
	MOVWF      PCLATH+0
	SWAPF      ___saveSTATUS+0, 0
	MOVWF      STATUS+0
	SWAPF      R15+0, 1
	SWAPF      R15+0, 0
	RETFIE
; end of _interrupt

_main:

;bismillah humidity.c,62 :: 		void main() {
;bismillah humidity.c,64 :: 		TRISB = 0;
	CLRF       TRISB+0
;bismillah humidity.c,65 :: 		PORTB = 0;
	CLRF       PORTB+0
;bismillah humidity.c,66 :: 		TRISA = 0b00100001;
	MOVLW      33
	MOVWF      TRISA+0
;bismillah humidity.c,67 :: 		CMCON = 7;
	MOVLW      7
	MOVWF      CMCON+0
;bismillah humidity.c,68 :: 		INTCON.GIE = 1;    //Enable global interrupt
	BSF        INTCON+0, 7
;bismillah humidity.c,69 :: 		INTCON.PEIE = 1;   //Enable peripheral interrupt
	BSF        INTCON+0, 6
;bismillah humidity.c,71 :: 		PIE1.TMR2IE = 1;  // Enable Timer2 interrupt
	BSF        PIE1+0, 1
;bismillah humidity.c,72 :: 		T2CON = 0;        // Prescaler 1:1, and Timer2 is off initially
	CLRF       T2CON+0
;bismillah humidity.c,73 :: 		PIR1.TMR2IF =0;   // Clear TMR INT Flag bit
	BCF        PIR1+0, 1
;bismillah humidity.c,74 :: 		TMR2 = 0;
	CLRF       TMR2+0
;bismillah humidity.c,76 :: 		delay_ms(3000);
	MOVLW      16
	MOVWF      R11+0
	MOVLW      57
	MOVWF      R12+0
	MOVLW      13
	MOVWF      R13+0
L_main23:
	DECFSZ     R13+0, 1
	GOTO       L_main23
	DECFSZ     R12+0, 1
	GOTO       L_main23
	DECFSZ     R11+0, 1
	GOTO       L_main23
	NOP
	NOP
;bismillah humidity.c,79 :: 		do {
L_main24:
;bismillah humidity.c,80 :: 		Delay_ms(1000);
	MOVLW      6
	MOVWF      R11+0
	MOVLW      19
	MOVWF      R12+0
	MOVLW      173
	MOVWF      R13+0
L_main27:
	DECFSZ     R13+0, 1
	GOTO       L_main27
	DECFSZ     R12+0, 1
	GOTO       L_main27
	DECFSZ     R11+0, 1
	GOTO       L_main27
	NOP
	NOP
;bismillah humidity.c,81 :: 		StartSignal();
	CALL       _StartSignal+0
;bismillah humidity.c,82 :: 		check = CheckResponse();
	CALL       _CheckResponse+0
;bismillah humidity.c,83 :: 		if (!check) {
	MOVF       R0+0, 0
	BTFSS      STATUS+0, 2
	GOTO       L_main28
;bismillah humidity.c,87 :: 		}
	GOTO       L_main29
L_main28:
;bismillah humidity.c,90 :: 		RH_Byte1 = ReadByte();
	CALL       _ReadByte+0
	MOVF       R0+0, 0
	MOVWF      _RH_Byte1+0
;bismillah humidity.c,91 :: 		RH_Byte2 = ReadByte();
	CALL       _ReadByte+0
	MOVF       R0+0, 0
	MOVWF      _RH_Byte2+0
;bismillah humidity.c,92 :: 		T_Byte1 = ReadByte();
	CALL       _ReadByte+0
	MOVF       R0+0, 0
	MOVWF      _T_Byte1+0
;bismillah humidity.c,93 :: 		T_Byte2 = ReadByte();
	CALL       _ReadByte+0
	MOVF       R0+0, 0
	MOVWF      _T_Byte2+0
;bismillah humidity.c,94 :: 		CheckSum = ReadByte();
	CALL       _ReadByte+0
	MOVF       R0+0, 0
	MOVWF      _CheckSum+0
;bismillah humidity.c,96 :: 		if (CheckSum == ((RH_Byte1 + RH_Byte2 + T_Byte1 + T_Byte2) & 0xFF))
	MOVF       _RH_Byte2+0, 0
	ADDWF      _RH_Byte1+0, 0
	MOVWF      R1+0
	CLRF       R1+1
	BTFSC      STATUS+0, 0
	INCF       R1+1, 1
	MOVF       _T_Byte1+0, 0
	ADDWF      R1+0, 1
	BTFSC      STATUS+0, 0
	INCF       R1+1, 1
	MOVF       _T_Byte2+0, 0
	ADDWF      R1+0, 1
	BTFSC      STATUS+0, 0
	INCF       R1+1, 1
	MOVLW      255
	ANDWF      R1+0, 0
	MOVWF      R3+0
	MOVF       R1+1, 0
	MOVWF      R3+1
	MOVLW      0
	ANDWF      R3+1, 1
	MOVLW      0
	XORWF      R3+1, 0
	BTFSS      STATUS+0, 2
	GOTO       L__main42
	MOVF       R3+0, 0
	XORWF      R0+0, 0
L__main42:
	BTFSS      STATUS+0, 2
	GOTO       L_main30
;bismillah humidity.c,104 :: 		message1[11] = 223;     // Degree symbol
	MOVLW      223
	MOVWF      _message1+11
;bismillah humidity.c,106 :: 		a =  RH_Byte1;
	MOVF       _RH_Byte1+0, 0
	MOVWF      _a+0
	CLRF       _a+1
;bismillah humidity.c,107 :: 		portb=a;
	MOVF       _a+0, 0
	MOVWF      PORTB+0
;bismillah humidity.c,112 :: 		}
	GOTO       L_main31
L_main30:
;bismillah humidity.c,118 :: 		}
L_main31:
;bismillah humidity.c,119 :: 		}
L_main29:
;bismillah humidity.c,121 :: 		}while(1);
	GOTO       L_main24
;bismillah humidity.c,122 :: 		}
L_end_main:
	GOTO       $+0
; end of _main
