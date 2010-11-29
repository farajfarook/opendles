package dles.dlesma.security;

import java.util.List;

import org.red5.server.api.IScope;
import org.red5.server.api.so.ISharedObject;
import org.red5.server.api.so.ISharedObjectSecurity;

public class CustomSharedObjectSecurity implements ISharedObjectSecurity 
{
    String[] acls = new String[0]; 
	
	public void setACL(String[] aclList)
	{
		this.acls = aclList;
	}
	
	public boolean isAvailableACL(String acl)
	{
		for (int i = 0; i < acls.length; i++) 
		{
			if(acls[i].equals(acl))
			{
				return true;
			}
		}
		return false;
	}
	
	
	
	@Override
	public boolean isConnectionAllowed(ISharedObject so) 
	{
	    // Note: we don't check for the name here as only one SO can be
	    //       created with this handler.
	    return true;
	}

	@Override
	public boolean isCreationAllowed(IScope scope, String name, boolean persistent) 
	{
		if(persistent)
			return false;
		
		return isAvailableACL(name);
	}
	
	@Override
	public boolean isDeleteAllowed(ISharedObject so, String key) 
	{
	    return true;
	}
	
	@Override
	public boolean isSendAllowed(ISharedObject so, String message, List<?> arguments)
	{
	    return true;
	}
	
	@Override
	public boolean isWriteAllowed(ISharedObject so, String key, Object value) 
	{
	    return true;
	}
	 
}