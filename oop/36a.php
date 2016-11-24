Abstract class Printer { 
	Abstract Protected $type; 
	Abstract Protected $fabrikant; 
	Abstract Protected $keer;

	Abstract Public PrintDocument($file); 
	Abstract Public FoutMelding($melding);

	// moet wel overgenomen worden
	Abstract Public AantalKerenGebruikt() { 
		Print "$this->keer gebruikt.";
	}
	
	// hoeft niet overgenomen te worden
	Public PrintType() {
		Print "Dit is $this->type";
	}
}
