const checkPath: string = '/check';

function buildCheckPath(usernameUrl: string): string {
    return `${checkPath}?url=${encodeURIComponent(usernameUrl)}`;
}

export type CheckUsernameResponse = {
    found: boolean
}

export async function checkUsernameUrl(usernameUrl: string): Promise<CheckUsernameResponse> {
    const response: Response = await fetch(buildCheckPath(usernameUrl));
    return await response.json();
}
