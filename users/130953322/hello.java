

import java.util.*;

/**
 *
 * @author kartik
 */
public class hello {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        
        Set<String> al=new HashSet<>();
        al.add("hi");
        al.add("hi");
        al.add("bye");
        al.add("how");
        al.add("are");
        al.add("you");
        for(String i:al)
        {
            System.out.println("wow"+i);
        }
        
    }
    
}
