//
// Copyright 2002 - 2004
// All rights reserved; steal the source but credit the victim, and your karma remains good
//
function checkVIN(inputVIN) {
	inputVIN.value = stripWhitespace(inputVIN.value.toUpperCase())
	var inputVINLength = checkLength(inputVIN.value);

	if (inputVINLength == 17) {
		if (!parseNeon(inputVIN))
			return 0;
		else {
			alert("Bad parsing");
			return 1;
		}
	} else {
		if (inputVINLength > 17)
			document.temps.STAT.value = "VIN is wrong length, too long";
		else
			document.temps.STAT.value = "VIN is wrong length, too short";
		return -1;
	}
	return 9;	//nobody falls off the bottom without a return code
}

function parseNeon(inputVIN) {
	var VIN = inputVIN.value;
	var CarValue = "Neon";

	// call the functions below
	// there are so many ways to do this, but substr'ing the variable
	// saves space.  eventually, a VIN object will have to be created
	// in a later release, with methods and attributes
	//
	// but not right now
	//
	document.temps.MY.value = ModelYear(VIN.substr(9, 1));
	var modelyearnum = ModelYearNum(VIN.substr(9, 1));

	document.temps.CO.value = WhereBuilt(VIN.substr(0, 1), modelyearnum);

	document.temps.MA.value = WhatMake(VIN.substr(1, 1), modelyearnum);

	document.temps.VT.value = WhatType(VIN.substr(2, 1));

	document.temps.PS.value = PosFour(VIN.substr(3, 1), modelyearnum);

	document.temps.VL.value = WhichLine(VIN.substr(4, 1), modelyearnum);

	document.temps.SE.value = WhichStyle(VIN.substr(5, 1), modelyearnum);

	document.temps.BS.value = BodyStyle(VIN.substr(6, 1), modelyearnum);

	document.temps.EN.value = WhichEngine(VIN.substr(7, 1), modelyearnum);

	document.temps.CH.value = VIN.substr(8, 1);

	document.temps.AI.value = WhereAssembled(VIN.substr(10, 1), VIN.substr(0, 1), modelyearnum);

	document.temps.CB.value = ConfirmCarNumber(VIN.substr(11, 6));

	document.temps.CHECKIT.value = checkDigitConfirm(VIN);

	document.temps.STAT.value = HotToTrot(modelyearnum, VIN.substr(7, 1), VIN.substr(5, 1));
	return 0;
}

function ModelYear(digitTen) {
	// usually returned to document.temps.MY.value
	switch (digitTen) {
		case "S": return "1995";
			break;
		case "T": return "1996";
			break;
		case "V": return "1997";
			break;
		case "W": return "1998";
			break;
		case "X": return "1999";
			break;
		case "Y": return "2000";
			break;
		case "1": return "2001";
			break;
		case "2": return "2002";
			break;
		case "3": return "2003";
			break;
		case "4": return "2004";
			break;
		case "5": return "2005";
			break;
		default: return "What the hell was that?";
			break;
	}
}

function ModelYearNum(digitTen) {
	switch (digitTen) {
		case "S": return 1995;
			break;
		case "T": return 1996;
			break;
		case "V": return 1997;
			break;
		case "W": return 1998;
			break;
		case "X": return 1999;
			break;
		case "Y": return 2000;
			break;
		case "1": return 2001;
			break;
		case "2": return 2002;
			break;
		case "3": return 2003;
			break;
		case "4": return 2004;
			break;
		case "5": return 2005;
			break;
		default: return "What the hell was that?";
			break;
	}
}

function WhereBuilt(digitOne, myn) {
	// usually returned to document.temps.CO.value
	// this is one of the easier conditional functions
	//
	switch (digitOne) {
		case "1": return "Belvidere, IL (USA)"; break;
		case "3": if (myn < 2000) {
			return "Toluca, MX (Mexico)"; break;
		} else {
			return "No Mexican Neons after 1999"; break;
		}
		case "?": return "Austria, but Neons aren't made in Austria"; break;
		default: return "Illegal value in first position";
	}
}

function WhatMake(digitTwo, myn) {
	// usually returned to document.temps.MA.value
	//
	switch (digitTwo) {
		case "B":
		case "D": return "Dodge";
			break;
		case "P": if (myn < 2002)
			return "Plymouth";
		else
			return "No Plymouth-badged Neons past 2001"; //updated based on new info
			break;
		case "C": return "Chrysler";
			break;
		default: return "Illegal value in second position";
			break;
	}
}

function WhatType(digitThree) {
	// usually returned to document.temps.VT.value
	//
	if (digitThree == "3")
		return "Passenger Car";
	else
		return "Illegal Neon value";
}

function PosFour(digitFour, myn) {
	// usually returned to document.temps.PS.value
	if (myn > 1999) {
		switch (digitFour) {
			case "A": return "Dual Front and Side Airbags"; break;
			case "B": return "manual/active unibelt"; break;
			case "E": return "Active Restraints, Dual Front Airbags"; break;
			default: return "Illegal NEON value in fourth pos"; break;
		}
	} else {
		switch (digitFour) {
			case "E": return "Active Restraints, Dual Front Airbags"; break;
			default: return "Illegal NEON value in fourth pos"; break;
		}
	}
}

function WhichLine(digitFive, myn) {
	// usually returned to document.temps.VL.value
	if (myn > 1999) {
		switch (digitFive) {
			case "S": return "Neon LHD [US/ Canada]";
				break;
			case "V": return "Neon RHD [Export]";
				break;
			default: return "Bad position five value";
				break;
		}
	} else {
		switch (digitFive) {
			case "6": return "Neon [Mexico]";
				break;
			case "S": return "Neon [US/ Canada/ Export]";
				break;
			case "V": return "Neon [Export/BUX/RHD]";
				break;
			default: return "Bad position five value";
				break;
		}
	}
}

function WhichStyle(digitSix, myn) {
	// usually returned to document.temps.SE.value
	// "M" and "A" always equal "manual BUX" and "auto BUX" respectively

	seriesYear = new Array();
	seriesYear["1997"] = new Array();  	//less than 1998
	seriesYear["1997"]["2"] = "Base model";
	seriesYear["1997"]["4"] = "Highline";
	seriesYear["1997"]["6"] = "Sport";

	seriesYear["1999"] = new Array();	//1998 and 1999
	seriesYear["1999"]["2"] = "Highline";
	seriesYear["1999"]["4"] = "Sport";

	seriesYear["2001"] = new Array();	//2000 and 2001
	seriesYear["2001"]["2"] = "SE";
	seriesYear["2001"]["4"] = "ES";

	seriesYear["2002"] = new Array();
	seriesYear["2002"]["1"] = "S [US]";
	seriesYear["2002"]["2"] = "Base [US]";
	seriesYear["2002"]["4"] = "SE/LE [US/ Canada]";
	seriesYear["2002"]["5"] = "ES/LX/SXT [US/ Canada]";
	seriesYear["2002"]["6"] = "ACR";
	seriesYear["2002"]["7"] = "R/T [US/ Canada]";

	seriesYear["2003"] = new Array();
	seriesYear["2003"]["2"] = "SE [US]";
	seriesYear["2003"]["4"] = "Base [Canada]";
	seriesYear["2003"]["5"] = "SXT/ Sport [US/ Canada]";
	seriesYear["2003"]["6"] = "SRT-4 [US]";
	seriesYear["2003"]["7"] = "R/T [US/ Canada]";

	seriesYear["2004"] = new Array();
	seriesYear["2004"]["2"] = "SE [US]";
	seriesYear["2004"]["4"] = "Base [Canada]";
	seriesYear["2004"]["5"] = "SXT/ Sport [US/ Canada]";
	seriesYear["2004"]["6"] = "SRT-4 [US]";
	seriesYear["2004"]["7"] = "R/T [US/ Canada]";

	switch (digitSix) {
		case "M": return "Manual Trans [Export]";
			break;
		case "A": return "Auto Trans [Export]";
			break;
		case "1":
		case "2":
		case "4":
		case "5":
		case "6":
		case "7": switch (myn) {
			case 1995:
			case 1996:
			case 1997: return seriesYear["1997"][digitSix];
				break;
			case 1998:
			case 1999: return seriesYear["1999"][digitSix];
				break;
			case 2000:
			case 2001: return seriesYear["2001"][digitSix];
				break;
			case 2002: return seriesYear["2002"][digitSix];
				break;
			case 2003: return seriesYear["2003"][digitSix];
				break;
			case 2004: return seriesYear["2004"][digitSix];
				break;
		}
		default: return "Unknown value in position six";
			break;
	}
}

function BodyStyle(digitSeven, myn) {
	// usually returned to  document.temps.BS.value
	if (myn > 1999 && digitSeven == "6")
		return "Sedan";
	else {
		switch (digitSeven) {
			case "2": return "Neon Coupe";
				break;
			case "7": return "Neon Sedan";
				break;
			default: return "Bad value position seven";
				break;
		}
	}
}

function WhichEngine(digitEight, myn) {
	// usually returned to document.temps.EN.value
	switch (myn) {
		case 1995:
		case 1996:
		case 1997:
		case 1998:
		case 1999: switch (digitEight) {
			case "C": return "2.0L SOHC";
				break;
			case "Y": return "2.0L DOHC"; //pre 2k R/T or ACR indicator
				break;
			case "?": return "1.8L SOHC";
				break;
			default: return "Unknown value in position 8";
				break;
		}
		case 2000:
		case 2001: switch (digitEight) {
			case "C": return "2.0L SOHC";
				break;
			case "F": return "2.0L SOHC Magnum"; //solid R/T or ACR indicator
				break;
			case "P": return "1.6L SOHC"; //possible export engine
				break;
			default: return "Unknown value in position 8";
				break;
		}

		case 2002:
		case 2003:
		case 2004:
		case 2005: switch (digitEight) {
			case "C": return "2.0L SOHC";
				break;
			case "F": return "2.0L SOHC Magnum"; //solid R/T or ACR indicator
				break;
			case "P": return "1.6L SOHC"; //possible export engine
				break;
			case "S": return "2.4L DOHC Intercooled Turbo"; //SRT=4 only
				break;
			default: return "Unknown value in position 8";
				break;
		}
		default: return "Illegal model year number";
			break;
	}
}

function WhereAssembled(digitEleven, CountryOrigin, myn) {
	// usually returned to document.temps.AI.value
	switch (digitEleven) {
		case "D": if (CountryOrigin == "1")
			return "Belvidere, Illinois - US/Canada/Export - MATCHED";
		else
			return "Belvidere, Illinois - US/Canada/Export - UNMATCHED";
			break;
		case "T": if (myn < 2000) {
			if (CountryOrigin == "3")
				return "Toluca, Mexico - US/Canada/Export - MATCHED";
			else
				return "Toluca, Mexico - US/Canada/Export - UNMATCHED";
			break;
		} else {
			return "Toluca didn't make Neons past 1999."
		}
			break;
		case "U": if (CountryOrigin == "?")
			return "Graz, Austria - MATCHED; Neons not made in Austria";
		else
			return "Graz, Austria - UNMATCHED; Neons not made in Austria";
			break;
		default: return "Unknown value in position eleven"; break;
	}
}

function ConfirmCarNumber(digits12to17) {
	// usually returned to document.temps.CB.value
	if (isDigit(digits12to17))
		return Number(digits12to17);
	else
		return "What the hell is this exactly?";
}

function checkDigitConfirm(inWholeVIN) {
	// digitNine goes right to document.temps.CH.value
	// and this usually returns to document.temps.CHECKIT.value
	var digitNine = inWholeVIN.substr(8, 1);
	var checkdigit = checkTheCheckdigit(inWholeVIN);

	if (digitNine == checkdigit)
		return "Valid checkdigit match: " + checkdigit;
	else
		return "Mismatch of checkdigit " + checkdigit + " and VIN value: " + digitNine;
}

function HotToTrot(myn, eng, seriesNum) {
	//	R/T model checking, return to document.temps.STAT.value 
	//	implies DOHC engine for pre 2k Neons, but some Neons got de-tuned DOHCs at times due to shortages
	//	close enough for pre 2002 models, 2002+ has R/T indicator in VIN
	//
	switch (myn) {
		case 1995:
		case 1996:
		case 1997:
		case 1998:
		case 1999: if (eng == "Y")
			return "VIN is valid and may have 150hp";
		else
			return "VIN is valid and has 132hp.";
			break;
		case 2000:
		case 2001: if (eng == "F")
			return "VIN is valid and is an R/T or ACR with 150 horses!";
		else
			return "VIN is valid and has 132hp.";
			break;
		case 2002: if (eng == "F" && seriesNum == "6")
			return "You have the coolest 2002 possible: an ACR.";
			if (eng == "F" && seriesNum == "7")
				return "You have an R/T, good job!";
			else
				return "VIN is valid and has 132hp.";
			break;
		case 2003:
		case 2004: if (seriesNum == "6" && eng == "S")
			return "Yours is a mighty SRT-4.  Excellent.";
		else
			if (seriesNum == "7" && eng == "F")
				return "An R/T, when you coulda had an SRT-4?";
			else
				return "VIN is valid and has 132hp.";
			break;
		default: return "VIN is valid and has 132hp.";
			break;
	}
}

function transformLetters(inLetter) {
	//	for any a-h = 1-8; j-n = 1-5; s-z = 2-9; 	p=7; r=9
	//	no i, o, q is allowed
	switch (inLetter) {
		case "A":
		case "J": return 1;
			break;
		case "B":
		case "K":
		case "S": return 2;
			break;
		case "C":
		case "L":
		case "T": return 3;
			break;
		case "D":
		case "M":
		case "U": return 4;
			break;
		case "E":
		case "N":
		case "V": return 5;
			break;
		case "F":
		case "W": return 6;
			break;
		case "G":
		case "P":
		case "X": return 7;
			break;
		case "H":
		case "T":
		case "Y": return 8;
			break;
		case "R":
		case "Z": return 9;
			break;
		default: return Number(inLetter);
			break; //unnecessary safety hatch
	}
	return 0;
}

// stole this unabashedly from developer.netscape.com
function stripCharsInBag(s, bag) {
	var i;
	var returnString = "";

	// Search through string's characters one by one.
	// If character is not in bag, append to returnString.

	for (i = 0; i < s.length; i++) {
		// Check that current character isn't whitespace.
		var c = s.charAt(i);
		if (bag.indexOf(c) == -1) returnString += c;
	}
	return returnString;
}

// lesson in wrapper functions
function stripWhitespace(s) {
	var whitespace = " \t\n\r";
	return stripCharsInBag(s, whitespace);
}

// Returns true if character c is a digit (0..9)
function isDigit(c) {
	return ((c >= "0") && (c <= "9"));
}

function checkTheCheckdigit(s) {
	var checkdigit = 0;
	for (var i = 0, j = 8; i < 17; i++, j--) {
		switch (i) {
			case 7: checkdigit += transformLetters(s.substr(i, 1)) * 10;
				break;
			case 8: continue;
			case 9: checkdigit += transformLetters(s.substr(i, 1)) * 9;
				j = 9;
				break;
			default: checkdigit += transformLetters(s.substr(i, 1)) * j;
		}
	}

	checkdigit %= 11;
	if (checkdigit == 10)
		return "X";
	else
		return checkdigit;
}

function checkLength(inputVIN) {
	return inputVIN.length;
}

//2004