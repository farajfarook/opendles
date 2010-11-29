package dles.dlesma.engine.database;

import java.util.ArrayList;

public class DBHandle 
{
	public static boolean UserAuthenticate(int userId, String authStr)
	{
		try
		{
			String sql = "select count(*) from `user_authenticate` where `user_id` = " 
						+ userId + " and `key` = '" + authStr + "'";
			
			ArrayList<ArrayList<String>> data = DBConnection.RunSQL(sql);
			boolean isLogged =  data.get(0).get(0).equals("1");			
			return isLogged;
		}
		catch(Exception ex)
		{
			return false;
		}
	}
	
	public static String[] getPublishACL(int userId)
	{
		return getACL(userId, 0);
	}
	
	public static String[] getPlayACL(int userId)
	{
		return getACL(userId, 1);
	}
	
	public static String[] getSharedObjectACL(int userId)
	{
		return getACL(userId, 2);
	}
	
	public static String[] getACL(int userId, int aclType)
	{
		try
		{
			String sql = "select name from `media_acl` where `user_id` = " 
						+ userId + " and `acl_type` = " + aclType;
			
			ArrayList<ArrayList<String>> data = DBConnection.RunSQL(sql);
			
			
			String[] names = new String[data.size()];
			
			for (int i = 0; i < names.length; i++) {
				names[i] = data.get(i).get(0);
			}
			return names;
		}
		catch(Exception ex)
		{
			return null;
		}
	}
	
	public static String getUsername(int userID)
	{
		try
		{
			String sql = "select first_name, last_name from `user` where `id` = " + userID;
			
			ArrayList<ArrayList<String>> data = DBConnection.RunSQL(sql);
			
			String[] names = new String[2];
			
			names[0] = data.get(0).get(0);
			names[1] = data.get(0).get(1);
			
			return names[0] + " " +names[1];
		}
		catch(Exception ex)
		{
			return null;
		}
	}
	
}
