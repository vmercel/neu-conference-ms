// Solidity program to implement
// the above approach
pragma solidity >= 0.7.0<0.8.0;

// Build the Contract
contract ConferenceMS
{
	// Create a structure for conference 
		struct Conference
	{
		int id;
		string confID;
		string cTitle;
		string cStartDate;
		string cEndDate;
	}

		struct AttendanceRecord
	{
		int id;
		string userID;
		string confID;
		string sID;
		string presenter;
		string pTitle;
		string sDate;
		string status;
				
	}

	// Create a structure for conference Session
			struct Session
	{
		int id;
		string  sID;
		string sTitle;
		string sStartDate;
		string sEndDate;
		string sPresenter;
	}

	// Create a structure for conference attendee
				struct People
	{
		int pID;
		string pUID;
		string pFName;
		string pEmail;
		string pQualif;
		string pSpecialty;
	}

	address owner;

	int public confCount = 0;
	int public pCount = 0;
	int public sCount = 0;
	int public aCount = 0;

	mapping(int => Conference) public conferenceRecords;
	mapping(int => Session) public sessionRecords;
	mapping(int => People) public peopleRecords;
	mapping(int => AttendanceRecord) public attendanceRegister;
	

	modifier onlyOwner
	{
		require(owner == msg.sender);
		_;
	}
	constructor()
	{
		owner=msg.sender;
	}

	// Create a function to add
	// the new records
	function addNewPerson(
						string memory _pUID,
						string memory _pFName,
						string memory _pEmail,
						string memory _pQualif,
						string memory _pSpecialty
						) public onlyOwner
	{
		// Increase the count by 1
		pCount = pCount + 1;

		// Fetch the student details
		// with the help of stdCount
		peopleRecords[pCount] = People(pCount, _pUID, _pFName,
									_pEmail, _pQualif, _pSpecialty);
	}

		

	// Create a function to add Conference Records
	function addNewConference(string memory _confID,
						string memory _cTitle,
						string memory _cStartDate,
						string memory _cEndDate) public onlyOwner
	{
		// Increase the count by 1
		confCount = confCount + 1;

		// Fetch the conference details
		// with the help of confCount
		conferenceRecords[confCount] = Conference(confCount, _confID, _cTitle,
									_cStartDate, _cEndDate);
	}

	// Create a function to add Conference Session Records
	function addNewSession(string memory _sID,
						string memory _sTitle,
						string memory _sStartDate,
						string memory _sEndDate,
						string memory _sPresenter) public onlyOwner
	{
		// Increase the count by 1
		sCount = sCount + 1;

		// Fetch the conference session details
		// with the help of sCount
		sessionRecords[sCount] = Session(sCount, _sID, _sTitle,
									_sStartDate, _sEndDate, _sPresenter);
	}


	function addAttendanceRecord(
		string memory _userID,
		string memory _confID,
		string memory _sID,
		string memory _presenter,
		string memory _pTitle,
		string memory _sDate,
		string memory _status
						) public onlyOwner
	{
		// Increase the count by 1
		aCount = aCount + 1;

		// Fetch the conference session details
		// with the help of sCount
		attendanceRegister[aCount] = AttendanceRecord(aCount, _userID, _confID, _sID, _presenter, _pTitle, _sDate, _status);
	}

	// Create a function to add bonus marks
	//function bonusMarks(int _bonus) public onlyOwner
	// {
	// 	stdRecords[stdCount].marks =
	// 				stdRecords[stdCount].marks + _bonus;
	// }
}

