import javax.swing.*;
import java.applet.Applet;
import java.awt.*;

public class HelloWorld extends JApplet{

    /**
     * Called by the browser or applet viewer to inform
     * this applet that it has been loaded into the system. It is always
     * called before the first time that the {@code start} method is
     * called.
     * <p>
     * A subclass of {@code Applet} should override this method if
     * it has initialization to perform. For example, an applet with
     * threads would use the {@code init} method to create the
     * threads and the {@code destroy} method to kill them.
     * <p>
     * The implementation of this method provided by the
     * {@code Applet} class does nothing.
     *
     * @see Applet#destroy()
     * @see Applet#start()
     * @see Applet#stop()
     */
    @Override
    public void init() {
        super.init();
        Graphics graphics = getGraphics();
        graphics.drawString("Hello,world!",50,50);
    }
}
