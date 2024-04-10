-- Create Patients Table
CREATE TABLE Patients (
                          PatientID INT AUTO_INCREMENT PRIMARY KEY,
                          FirstName VARCHAR(255) NOT NULL,
                          LastName VARCHAR(255) NOT NULL,
                          DateOfBirth DATE NOT NULL,
                          Gender CHAR(1),
                          Address VARCHAR(255),
                          Phone VARCHAR(20),
                          Email VARCHAR(255) UNIQUE
);

-- Create Doctors Table
CREATE TABLE Doctors (
                         DoctorID INT AUTO_INCREMENT PRIMARY KEY,
                         FirstName VARCHAR(255) NOT NULL,
                         LastName VARCHAR(255) NOT NULL,
                         Specialization VARCHAR(255),
                         Phone VARCHAR(20),
                         Email VARCHAR(255) UNIQUE
);

-- Create Appointments Table
CREATE TABLE Appointments (
                              AppointmentID INT AUTO_INCREMENT PRIMARY KEY,
                              PatientID INT,
                              DoctorID INT,
                              AppointmentDate DATE NOT NULL,
                              AppointmentTime TIME NOT NULL,
                              Status VARCHAR(50),
                              FOREIGN KEY (PatientID) REFERENCES Patients(PatientID),
                              FOREIGN KEY (DoctorID) REFERENCES Doctors(DoctorID)
);

-- Create Medical Records Table
CREATE TABLE MedicalRecords (
                                RecordID INT AUTO_INCREMENT PRIMARY KEY,
                                PatientID INT,
                                Date DATE NOT NULL,
                                Diagnosis TEXT,
                                Treatment TEXT,
                                DoctorID INT,
                                FOREIGN KEY (PatientID) REFERENCES Patients(PatientID),
                                FOREIGN KEY (DoctorID) REFERENCES Doctors(DoctorID)
);

-- Create Treatments Table
CREATE TABLE Treatments (
                            TreatmentID INT AUTO_INCREMENT PRIMARY KEY,
                            Name VARCHAR(255) NOT NULL,
                            Description TEXT
);

-- Create PatientTreatments Table (to handle many-to-many relationship between Patients and Treatments)
CREATE TABLE PatientTreatments (
                                   PatientTreatmentID INT AUTO_INCREMENT PRIMARY KEY,
                                   PatientID INT,
                                   TreatmentID INT,
                                   Date DATE NOT NULL,
                                   DoctorID INT,
                                   FOREIGN KEY (PatientID) REFERENCES Patients(PatientID),
                                   FOREIGN KEY (TreatmentID) REFERENCES Treatments(TreatmentID),
                                   FOREIGN KEY (DoctorID) REFERENCES Doctors(DoctorID)
);
