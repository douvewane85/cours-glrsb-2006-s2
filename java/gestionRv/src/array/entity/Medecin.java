package array.entity;

import java.time.LocalDate;

public class Medecin {
  private final int N=20;
  private String nomPrenom;
  private  String telephone; 
  private RendezVous[] rendezVous=new RendezVous[N];
  private int nbreRendezVous;
public Medecin(String nomPrenom, String telephone) {
    this.nomPrenom = nomPrenom;
    this.telephone = telephone;
}
  public int getNbreRendezVous() {
    return nbreRendezVous;
}
  public String getNomPrenom() {
    return nomPrenom;
  }
  public void setNomPrenom(String nomPrenom) {
    this.nomPrenom = nomPrenom;
  }
  public String getTelephone() {
    return telephone;
  }
  public void setTelephone(String telephone) {
    this.telephone = telephone;
  }
  public RendezVous[] getRendezVous() {
    return rendezVous;
  }
  public RendezVous[] getRendezVous(LocalDate date) {
    RendezVous[] rendezVousByDate=new RendezVous[N];
    int nbreRvByDate=0;
    for (int index = 0; index < this.nbreRendezVous; index++) {
          LocalDate dateDuRv=this.rendezVous[index].getDateHeure().toLocalDate();
          if (dateDuRv.isEqual(date)) {
              rendezVousByDate[nbreRvByDate++]=this.rendezVous[index];
          }
    }
    return rendezVousByDate;
  }

   public boolean addRendezVous(RendezVous rv) {
    if(this.nbreRendezVous<N){
        this.rendezVous[this.nbreRendezVous++]=rv;
        return true;
    }
       return false;
   }

}
