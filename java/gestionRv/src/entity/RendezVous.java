package entity;

import java.time.LocalDateTime;

public class RendezVous {
    //LocalDateTime (LocalDate + LocalTime)
    private LocalDateTime dateHeure;
    private Patient patient;
    private Medecin medecin;

    public RendezVous(LocalDateTime dateHeure, Patient patient) {
        this.dateHeure = dateHeure;
        this.patient = patient;
    }
    public LocalDateTime getDateHeure() {
        return dateHeure;
    }
    public void setDateHeure(LocalDateTime dateHeure) {
        this.dateHeure = dateHeure;
    }
    public Patient getPatient() {
        return patient;
    }
    public void setPatient(Patient patient) {
        this.patient = patient;
    }
    public Medecin getMedecin() {
        return medecin;
    }
    public void setMedecin(Medecin medecin) {
        this.medecin = medecin;
    }
    @Override
    public String toString() {
        return "RendezVous [dateHeure=" + dateHeure + ", patient=" + patient + "]";
    }
}
