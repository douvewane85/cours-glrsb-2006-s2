package entity;

public enum Specialite {
    MATHS, PHYSIQUE, SVT, INFORMATIQUE, FRANCAIS, ANGLAIS;
    public static Specialite[] getAllSpecialite() {
        return Specialite.values();
    }
}
