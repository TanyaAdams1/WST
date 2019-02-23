<?php
error_reporting(0);

$redirect=htmlspecialchars("/homework/w5/index.php");
include_once "../../core/util.php";
if ($_SERVER["REQUEST_METHOD"]!="GET")
    dieout(405);
if (!isset($_COOKIE["token"])||!check_token($_COOKIE["token"]))
    redirect("/account/login.php?redirect=".$redirect);
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Week 5-Homework</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
  <body>
  <nav class="navbar navbar-expand navbar-dark sticky-top flex-column flex-md-row bd-navbar" style="background-color:#8c0000">
      <a class="navbar-brand" href="http://www.pku.edu.cn" target="_blank">
          <img src="/resources/pkulogo_white.png" alt="PKU" />
      </a>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
              <li class="nav-item">
                  <a class="nav-link" href="http://net.pku.edu.cn/~zt/wst/" target="_blank">Course Home Page<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="http://162.105.146.180/Phorum/index.php" target="_blank">Class Forum</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="http://162.105.146.180/wst/homework/2017/homework.html" target="_blank">Class Homework Page</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="/" target="_self">Home Page</a>
              </li>
          </ul>
      </div>
          <ul class="text-light navbar-nav">
              <li class="nav-link mt-3 mr-3">
                  <p>
                      Welcome,
                      <?php
                      echo get_info($_COOKIE["token"])["name"];
                      ?>
                      !
                  </p>
              </li>

          </ul>
          <a class="btn btn-outline-light text-light" href="/account/logout.php?redirect=<?php echo $redirect?>">Logout</a>
  </nav>
  <p>
  <h1 class="text-center text-danger">
      Homework of Week 5
  </h1></p>
<hr>
    <div class="container">
        <div class="row m-2">
            <div class="col">
                <h2 class="text-center">
                    The screenshots of my program
                </h2>
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="Command.png" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="MainWindow.png" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="MainWindow2.png" alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col">
                <h2 class="text-center">
                    Sources of my program
                </h2>
            </div>
        </div>
        <div class="row m-2">
            <div class="col m-2">
                <div class="card">
                    <div class="card-header">Runsample.java</div>
                    <div class="card-body" style="overflow: scroll;height: 300px">
                        <pre>
                        <code class="java hljs">

class RunSample {

  public static void main(String args[]) {
    new internetics.Sample("y2017g47").show();
  }
}

                        </code>
                    </pre>
                    </div>
                </div>
            </div>
            <div class="col m-2">
                <div class="card">
                    <div class="card-header">
                        Sample.java
                    </div>
                    <div class="card-body"  style="overflow:scroll;height: 300px">
                        <pre>
                            <code class="java hljs">
                                /*
 * Sample.java
 * Class description and usage here.
 * Created on 15 October 2003
 */

package internetics;

/**
 * @author  Julia
 * @version 1.2
 */
import javax.swing.*;
import java.awt.*;
import java.awt.event.*;
import java.io.*;
import java.util.Scanner;
// import com.ralph.*;
public class Sample extends JFrame
       implements java.awt.event.ActionListener{

  private JButton jButton1;  // this button is for pressing
  private JLabel jLabel1;
  private String name;
  private Scanner input;

  /** Creates new object ChooseFile */
  public Sample() {
    initComponents();
    name = "";
    selectInput();
  }

  public Sample(String name) {
    this();
    this.name = name;
  }

  private void initComponents() {
    Color bright = Color.red;
    jButton1 = new JButton();
    jLabel1= new JLabel();

    addWindowListener(new WindowAdapter() {
      public void windowClosing(WindowEvent evt) {
        exitForm(evt);
      }
    });
    getContentPane().setLayout(new java.awt.GridLayout(2, 1));
    jButton1.setBackground(Color.white);
    jButton1.setFont(new Font("Verdana", 1, 12));
    jButton1.setForeground(bright);
    jButton1.setText("Click Me!");
    jButton1.addActionListener(this);
    jLabel1.setFont(new Font("Verdana", 1, 18));
    jLabel1.setText("Group y2017g47");
    jLabel1.setOpaque(true);
    getContentPane().add(jButton1);
    getContentPane().add(jLabel1);
    pack();
  };

  public void actionPerformed(ActionEvent evt) {
    System.out.print("Talk to me " +name+ " : ");
    try {
      jLabel1.setText(input.nextLine());
    } catch (Exception ioe) {
      jLabel1.setText("Ow! You pushed my button");
      System.err.println("IO Error: " + ioe);
    }
  }

  /** Exit this Application */
  private void exitForm(WindowEvent evt) {
    System.exit(0);
  }

  /** Initialise and Buffer input Stream */
  private void selectInput() {
    input=new Scanner(System.in);
  }

  /** Getter for name prompt */
  public String getName() {
    return name;
  }

  /** Setter for name prompt */
  public void setName(String name) {
  this.name = name;
  }

  /**
   * @param args the command line arguments
   */
  public static void main(String args[]) {
    new Sample("Jess").show();
  }

}
                            </code>
                        </pre>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <div class="alert alert-danger text-center">This is the end of homework 5</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/default.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
  <script>hljs.initHighlightingOnLoad();</script>
  </body>
</html>