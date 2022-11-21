package com.example.demo;

import javafx.fxml.FXMLLoader;
import javafx.scene.Node;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.image.ImageView;
import javafx.scene.input.MouseEvent;
import javafx.stage.Stage;

import java.io.IOException;

public class HelloController {
    private Stage stage;
    private Scene scene;
    private Parent root;
   public void handleShopEvent(MouseEvent event) throws IOException {
       Parent root = FXMLLoader.load(getClass().getResource("shop-view.fxml"));
       stage = (Stage)((Node)event.getSource()).getScene().getWindow();
       showScreen(root, stage);
   }

    public void handleNewsEvent(MouseEvent event) throws IOException {
        Parent root = FXMLLoader.load(getClass().getResource("news-view.fxml"));
        stage = (Stage)((Node)event.getSource()).getScene().getWindow();
        showScreen(root, stage);
    }

    public void handleProfileEvent(MouseEvent event) throws IOException {
        Parent root = FXMLLoader.load(getClass().getResource("profile-view.fxml"));
        stage = (Stage)((Node)event.getSource()).getScene().getWindow();
        showScreen(root, stage);
    }
    public void handleRanksEvent(MouseEvent event) throws IOException {
        Parent root = FXMLLoader.load(getClass().getResource("ranks-view.fxml"));
        stage = (Stage)((Node)event.getSource()).getScene().getWindow();
        showScreen(root, stage);
    }
    public void showScreen(Parent root, Stage stage) throws IOException {
        scene = new Scene(root);
        stage.setScene(scene);
        stage.show();
    }
}