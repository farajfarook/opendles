package dles.dlesma.engine;
import dles.dlesma.engine.database.DBHandle;

public class Authenticator 
{
	public static boolean UserAuthenticate(int userID, String authStr)
	{
		return DBHandle.UserAuthenticate(userID, authStr);
		//return true;
	}
}
