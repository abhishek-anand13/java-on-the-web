 import java.lang.Thread;
class A extends Thread
{
 public void run()
 {
  for(int i=0;i<=5;i++)
  {
    System.out.println("\t from Thread A i="+i);
   }
   System.out.println("exit from A");
  }
}
class B extends Thread
{
 public void run()
 {
  for(int j=0;j<=5;j++)
  {
    System.out.println("\t from Thread B j="+j);
   }
   System.out.println("exit from B");
  }
}
class C extends Thread
{
 public void run()
 {
  for(int k=0;k<=5;k++)
  {
    System.out.println("\t from Thread C k="+k);
   }
   System.out.println("exit from C");
  }
}
class prog41
{
public static void main(String args[])
{
new A().start();
new B().start();
new C().start();
}
}