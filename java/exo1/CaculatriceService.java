/*
   final: la classe ne peut pas être héritée
 */
public final  class CaculatriceService {
    private CaculatriceService() {
        // Constructeur privé pour empêcher l'instanciation de la classe
    }
    public static int add(int a, int b) {
        return a + b;
    }

    public static int subtract(int a, int b) {
        return a - b;
    }

    public static int multiply(int a, int b) {
        return a * b;
    }

    public static double divide(int a, int b) {
        if (b == 0) {
            throw new IllegalArgumentException("Cannot divide by zero");
        }
        /*
         Algo
           div:divition entiere()
             int a = 5, b = 2;
             int result = a div b; // result = 2
             int modulo= a % b; // modulo = 1
            /:division reelle
             int a = 5, b = 2;
             double result = a / b; // result = 2,5
        Java
             /: division entiere ou  reelle
               - si les deux operandes sont des entiers, le resultat est un entier (division entiere)
                int a = 5, b = 2;
                int result = a / b; // result = 2
                int modulo= a % b; // modulo = 1
               - si au moins un des operandes est un nombre a virgule, le resultat est un nombre a virgule (division reelle)
                 int a = 5; double b = 2.0;
                 double result = a / b; // result = 2,5
             Note: pour obtenir une division reelle a partir de deux entiers, 
                   il suffit de convertir l'un des operandes en double avant la division
                   int a = 5, b = 2;
                   double a1= (double) a; // conversion de a en double
                   double result = a1 / b; // result = 2,5

                   double result = (double) a / b; // conversion de a en double avant la division
        */
        return (double) a / b;
    }
    
}
