package list.service;

import java.util.ArrayList;

import list.entity.Patient;

public class PatientService {
    private static ArrayList<Patient> patients=new ArrayList<Patient>();
    private PatientService(){

    }

    public static boolean addPatient(Patient patient){
        patients.add(patient);
        return true;
    }

   public static Patient getPatientByTel(String tel){
        for (Patient patient: patients) {
               if (patient.getTelephone().compareTo(tel)==0) {
                  return patient;
               }
        }
         return null;
    }
}
