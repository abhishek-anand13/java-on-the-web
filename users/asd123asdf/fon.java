 import java.io.*;

class fon 
{
   public static void main(String args[])
    {
	    //javap java.io.File
               File f = new File("mynewfile.txt");
			   File f1 = new File("Ram");
			   File f2 = new File("fileoperation.class");
			   File f5 = new File("Shyam");
			   File f4 = new File("folder1/folder2");
			    try {
				    
				      f.createNewFile();
					  f2.delete();
					  File f3 = new File("mynewfile2.txt");
					  f.renameTo(f3);
					  f1.mkdirs();
					  f5.mkdir();
					 // boolean s = f4.mkdir();
					 boolean s = f4.mkdirs();
					  System.out.println(s);
					}
					catch(Exception e)
					{
					}
	}
}