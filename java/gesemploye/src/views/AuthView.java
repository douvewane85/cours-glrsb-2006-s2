package views;

public final class AuthView {
     private AuthView() {
     }

    public static String saisieChaine(String message) {
        do {
            System.out.print(message);
            String input = System.console().readLine();
            if (input != null && !input.trim().isEmpty()) {
                return input.trim();
            }
           
        }while(true);
    }
} 
