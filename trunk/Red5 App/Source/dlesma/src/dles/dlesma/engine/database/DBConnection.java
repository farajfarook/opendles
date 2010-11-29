package dles.dlesma.engine.database;

import java.io.BufferedReader;
import java.io.File;
import java.io.FileInputStream;
import java.io.InputStreamReader;
import java.sql.*;
import java.util.ArrayList;


public class DBConnection 
{
	private String host = "localhost";
	private String port = "3306";
	private String username = "root";
	private String password = "";
	private String database = "dles_db";
	
	private Connection conn;
	
	private static DBConnection dbh = new DBConnection();
	
	public static boolean Init()
	{
		try
		{
			File file = new File("webapps/dlesma/WEB-INF/classes/dles/dlesma/engine/database/db.conf");
			FileInputStream inputStream = new FileInputStream(file);
			BufferedReader reader = new BufferedReader(new InputStreamReader(inputStream));
			String strVal = reader.readLine();
			String[] data = strVal.split("[:]");
			dbh.host = data[0];
			dbh.port = data[1];
			dbh.username = data[2];
			dbh.password = data[3];
			dbh.database = data[4];
			return true;
		}
		catch(Exception ex)
		{
			dbh.host = "localhost";
			dbh.port = "3306";
			dbh.username = "admin";
			dbh.password = "Sesh!@#4a";
			dbh.database = "dles_db";
			return false;
		}
	}
	
	public static boolean Connect()
	{
		try {
			Class.forName("com.mysql.jdbc.Driver").newInstance();
		    dbh.conn = DriverManager.getConnection("jdbc:mysql://"+dbh.host+":"+dbh.port+"/"+dbh.database
		    										,dbh.username
		    										,dbh.password);
		    return true;
		}
		catch(Exception ex)
		{
			return false;
		}
	}
	
	public static boolean Disconnect()
	{
		try
		{
			dbh.conn.close();
			return true;
		}
		catch (Exception e) {
			// TODO: handle exception
			return false;
		}
	}
	
	public static boolean RunSQLManupulation(String query) throws Exception
	{
		Statement stmt = dbh.conn.createStatement();
		return stmt.execute(query);
	}
	
	public static ArrayList<ArrayList<String>> RunSQL(String query) throws Exception
	{
		ArrayList<ArrayList<String>> data = new ArrayList<ArrayList<String>>();
		Statement stmt = dbh.conn.createStatement();
	    //Execute the SQL statement and get the results in a Result set
	    ResultSet rs = stmt.executeQuery(query);
	    // Iterate through the ResultSet, displaying two values
	    // for each row using the getString method
	    int numCols = rs.getMetaData().getColumnCount();
	    	    
	    while (rs.next())
	    {
	        ArrayList<String> datum = new ArrayList<String>();
	        for (int i = 1; i <= numCols; i++)
	        {
	        	datum.add(rs.getString(i));
			}
	        data.add(datum);
	    }
	    return data;
	}
}
